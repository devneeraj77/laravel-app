# Laravel on Vercel: Complete Deployment Guide

This guide provides a full, step-by-step process to correctly deploy this Laravel application to Vercel. Follow these instructions carefully to ensure a successful deployment.

## Step 1: Vercel Project Configuration

The settings in your Vercel dashboard must match your project's structure.

1.  **Connect to GitHub/GitLab/Bitbucket**: If you haven't already, push your project to a Git provider and connect your repository to Vercel.

2.  **Set the Root Directory**: This is the most important setting.
    *   Go to your project's dashboard on Vercel.
    *   Navigate to **Settings** -> **General**.
    *   Find the **Root Directory** setting.
    *   Set it to `flightflaremart`.
    *   Click **Save**.

This tells Vercel that your application code is in the `flightflaremart` subdirectory, which is required for all other paths to work correctly.

## Step 2: Set Environment Variables

Your application needs several secret keys and configuration variables to run. These **must** be set in the Vercel dashboard, not in your code.

1.  **Generate Your Application Key (`APP_KEY`)**
    *   Open a terminal on your local computer and navigate to your project folder:
        ```bash
        cd flightflaremart
        ```
    *   Run the following Artisan command to generate a new, secure key:
        ```bash
        php artisan key:generate --show
        ```
    *   This will output a long string starting with `base64:`. Copy this entire string.

2.  **Add Environment Variables to Vercel**
    *   On your Vercel project dashboard, go to **Settings** -> **Environment Variables**.
    *   Add the following variables one by one. Make sure they are applied to the **Production** environment.

| Variable Name   | Value                                        | Description                                                                                                                              |
| --------------- | -------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `APP_KEY`         | `(Paste the key you generated)`              | **Required.** Used by Laravel for all encryption. The app will not run without it.                                                       |
| `APP_URL`         | `https://your-project-name.vercel.app`       | **Required.** The final public URL of your Vercel app.                                                                                   |
| `DB_CONNECTION`   | `sqlite`                                     | Sets the database driver. `sqlite` is the simplest for Vercel.                                                                           |
| `DB_DATABASE`     | `/tmp/database.sqlite`                       | **Required for SQLite.** Vercel's file system is read-only except for the `/tmp` directory. This tells Laravel to create the database file there. |

**Important Notes on Configuration:**

*   **Sessions**: We have already forced the `SESSION_DRIVER` to `cookie` in `vercel.json`. This is to prevent Laravel from trying to write session files to disk or the database, which is not suitable for a serverless environment.
*   **Logging**: We have also set `LOG_CHANNEL` to `stderr` in `vercel.json`. This directs all logs to Vercel's function logs, allowing you to see errors on your dashboard.
*   **Database**: Using SQLite on Vercel means your database will be **reset** every time the application starts fresh (a "cold start"). It is not persistent. For a production application with data that needs to be saved, you must use an external, serverless-friendly database service like PlanetScale, Neon, or Amazon RDS.

## Step 3: Deploy and Verify

1.  After setting the Root Directory and Environment Variables, trigger a new deployment.
    *   Go to the **Deployments** tab on Vercel.
    *   Click the "Redeploy" button on the latest deployment, or trigger a new one by pushing a commit to your Git repository.

2.  **Check Logs**:
    *   **Build Logs**: If the deployment fails, check the build logs for errors during the `composer` or `npm` steps.
    *   **Function Logs**: If the deployment succeeds but you see a 500 error, go to the **Functions** tab, select the `/api/index` function, and check its logs for runtime errors.

By following this guide, your project will be correctly configured to run on Vercel.
