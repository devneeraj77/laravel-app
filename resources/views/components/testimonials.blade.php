<div class="">
    <div class="flex flex-wrap  mt-10 justify-center">
        @foreach($testimonials as $t)
            <div class="p-8 m-4 max-w-xs rounded-lg bg-[#FDFDFE] shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-300 cursor-pointer">

                <!-- Stars -->
                <div class="flex items-center gap-1">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.04894 0.92705C7.3483 0.00573921 8.6517 0.00573969 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58778 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z"
                                 class="fill-accent" />
                        </svg>
                    @endfor
                </div>

                <!-- Message -->
                <p class="text-gray-500 text-sm my-5 overflow-hidden"
                   style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                    “{{ $t->message }}”
                </p>

                <hr class="mb-5 border-gray-300" />

                <!-- User Info -->
                <div class="flex items-center gap-4">
                    <img src="{{ $t->avatar }}"
                         class="w-12 h-12 object-cover rounded-full"
                         alt="{{ $t->name }}">
                    <div class="text-sm text-gray-600">
                        <h3 class="font-medium">{{ $t->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $t->title }}</p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    <div class="text-center w-full mt-14">
       <a class="link link-accent text-base">Find more</a>
    </div>
</div>
