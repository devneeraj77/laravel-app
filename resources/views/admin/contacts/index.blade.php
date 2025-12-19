@extends('admin.layouts.app')

@section('page_title', 'Contact Messages')

@section('breadcrumb')
<span class="text-slate-500">Admin / Messages</span>
@endsection

@section('content')
<div class="mx-auto max-w-full">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-900">Incoming Contact Messages ({{ $messages->count() }})</h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-x-auto">

        @if ($messages->isEmpty())
        <div class="p-8 text-center text-gray-500">
            <p class="text-xl mb-2">Inbox is empty!</p>
            <p>No contact messages have been submitted yet.</p>
        </div>
        @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sender
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Message Preview
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($messages as $message)
                <tr class="@if(!$message->is_read) bg-indigo-50/50 hover:bg-indigo-100/50 @else hover:bg-gray-50 @endif transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium @if($message->is_read) bg-gray-100 text-gray-800 @else bg-indigo-100 text-indigo-800 @endif">
                            @if(!$message->is_read) New @else Read @endif
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $message->subject }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                        <div class="text-sm text-gray-500">{{ $message->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs  " title="{{ $message->message }}">
                        {{ Str::limit($message->message, 200) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm  text-gray-500">
                        {{ $message->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        @if(!$message->is_read)
                        <form action="{{ route('admin.contacts.mark-read', $message->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                <!-- seen -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-closed">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4" />
                                    <path d="M3 15l2.5 -3.8" />
                                    <path d="M21 14.976l-2.492 -3.776" />
                                    <path d="M9 17l.5 -4" />
                                    <path d="M15 17l-.5 -4" />
                                </svg>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('admin.contacts.destroy', $message->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this message? This action cannot be undone.');">
                                <!-- delete -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection