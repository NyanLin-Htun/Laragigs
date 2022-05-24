<x-layout>
    <x-card-wrapper class="p-10 rounded max-w-lg mx-auto mt-24" >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit a Gig
                        </h2>
                        <p class="mb-4">Edit a gig</p>
                    </header>

                    <form method="POST" action="/listings/{{$listing->id}}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                value="{{old('company', $listing->company)}}"
                            />
                            @error('company')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Senior Laravel Developer"
                                value="{{old('title', $listing->title)}}"
                            />
                            @error('title')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Job Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Remote, Boston MA, etc"
                                value="{{old('location', $listing->location)}}"
                            />
                            @error('location')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email', $listing->email)}}"
                            />
                            @error('email')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                value="{{old('website', $listing->website)}}"
                            />
                            @error('website')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: Laravel, Backend, Postgres, etc"
                                value="{{old('tags', $listing->tags)}}"
                            />
                            @error('tags')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                                value="{{old('logo')}}"
                            />
                            <div>
                                <img
                                    class="hidden w-48 mr-6 md:block"
                                    src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('/images/no-image.png')}}"
                                    alt=""
                                />
                            </div>
                            @error('logo')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                                value="{{old('description')}}"
                            >{{$listing->description}}</textarea>

                            @error('description')
                                <p class="text-red-500 text-xs mt-5">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Update Gig
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </x-card-wrapper>
</x-layout>