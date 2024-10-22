<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Element') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Create New Element</h1>

                        <form action="{{ route('pages.sections.elements.store', [$page_id, $section_id]) }}" method="POST" id="element-form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="type">Element Type:</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div id="text-form" class="element-specific-form" style="display:none;">
                                <div class="form-group">
                                    <label for="text_content">Content:</label>
                                    <textarea name="content" id="text_content" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="text_style">Style:</label>
                                    <select name="style" id="text_style" class="form-control">
                                        <option value="">Select Style</option>
                                        <option value="bold">Bold</option>
                                        <option value="italic">Italic</option>
                                        <option value="underline">Underline</option>
                                        <!-- Add more styles as needed -->
                                    </select>
                                </div>
                            </div>

                            <div id="image-form" class="element-specific-form" style="display:none;">
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label for="image_content">Alt Text:</label>
                                    <input type="text" name="alt_text" id="image_content" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="image_style">Style:</label>
                                    <select name="style" id="image_style" class="form-control">
                                        <option value="">Select Style</option>
                                        <option value="responsive">Responsive</option>
                                        <option value="center">Center</option>
                                        <!-- Add more styles as needed -->
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Element</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <script>
        document.getElementById('type').addEventListener('change', function() {
            const selectedType = this.value;
            document.querySelectorAll('.element-specific-form').forEach(form => {
                form.style.display = 'none'; // Hide all specific forms
                // Reset required attribute
                const textContentField = document.getElementById('text_content');
                const imageField = document.getElementById('image');
                const imageContentField = document.getElementById('image_content');

                if (textContentField) textContentField.removeAttribute('required');
                if (imageField) imageField.removeAttribute('required');
                if (imageContentField) imageContentField.removeAttribute('required');
            });

            if (selectedType) {
                const selectedForm = document.getElementById(`${selectedType}-form`);
                selectedForm.style.display = 'block'; // Show the selected form

                // Set the required attribute only for visible fields
                if (selectedType === 'text') {
                    document.getElementById('text_content').setAttribute('required', 'required');
                } else if (selectedType === 'image') {
                    document.getElementById('image').setAttribute('required', 'required');
                    document.getElementById('image_content').setAttribute('required', 'required');
                }
            }
        });
    </script>
</x-app-layout>
