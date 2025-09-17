<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse - Create New Game</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .neon-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3), 0 0 40px rgba(59, 130, 246, 0.1);
        }

        .glass-morphism {
            background: rgba(30, 30, 63, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
        }

        .form-input,
        .form-textarea,
        .form-select {
            background: rgba(30, 30, 63, 0.8);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            color: white;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: rgba(156, 163, 175, 0.7);
        }

        .btn-neon {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
        }

        .btn-neon:hover {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.6), 0 0 35px rgba(59, 130, 246, 0.3);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #6b7280, #4b5563);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #9ca3af, #6b7280);
            transform: translateY(-1px);
        }

        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .upload-zone {
            border: 2px dashed rgba(59, 130, 246, 0.3);
            background: rgba(59, 130, 246, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .upload-zone:hover {
            border-color: rgba(59, 130, 246, 0.6);
            background: rgba(59, 130, 246, 0.1);
        }

        .upload-zone.dragover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.15);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .pricing-option {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .pricing-option:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.1);
        }

        .pricing-option.selected {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.2);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }

        .checkbox-custom {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 2px;
            background: rgba(30, 30, 63, 0.6);
            position: relative;
            cursor: pointer;
        }

        .checkbox-custom:checked {
            background: #3b82f6;
            border-color: #3b82f6;
        }

        .checkbox-custom:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 10px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .radio-custom {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 50%;
            background: rgba(30, 30, 63, 0.6);
            position: relative;
            cursor: pointer;
        }

        .radio-custom:checked {
            background: #3b82f6;
            border-color: #3b82f6;
        }

        .radio-custom:checked::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="text-white min-h-screen">
    <!-- Navigation -->
    <nav class="glass-morphism border-b border-blue-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-lg flex items-center justify-center neon-glow">
                        <span class="text-white font-bold text-lg">P</span>
                    </div>
                    <span class="ml-3 text-xl font-bold gradient-text">Playverse</span>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm">Browse</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm">Developer Logs</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm">Community</a>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full"></div>
                        <span class="text-sm font-medium">Shadowisc</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <nav class="text-sm text-gray-400 mb-4">
                <a href="#" class="hover:text-white">Dashboard</a>
            </nav>
            <h1 class="text-3xl font-bold gradient-text mb-2">Create a new project</h1>
        </div>

        <!-- Main Form -->
        <form class="space-y-8" action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Basic Info Section -->
            <div class="form-card rounded-xl p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Title</label>
                            <input type="text" name="title" class="form-input w-full px-4 py-3 rounded-lg"
                                placeholder="Enter your game title">
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Short description or
                                tagline</label>
                            <input type="text" name="short_description" class="form-input w-full px-4 py-3 rounded-lg"
                                placeholder="Optional">
                            <p class="text-xs text-gray-500 mt-1">Shown when we link to your project. Avoid duplicating
                                your project's title.</p>
                        </div>

                        <!-- Platfrom -->
                        <label class="block text-sm font-medium text-gray-300 mb-2">Platform</label>
                        <select name="platform_id" class="form-select w-full px-4 py-3 rounded-lg">
                            <option value="">Select platform</option>
                            @foreach($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach
                        </select>

                        <!-- Classification -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Classification</label>
                            <select class="form-select w-full px-4 py-3 rounded-lg" name="classification_id">
                                <option value="">Select classification</option>
                                @foreach($classifications as $classification)
                                    <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Release Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Release status</label>
                            <select class="form-select w-full px-4 py-3 rounded-lg" name="release_status">
                                <option value="released">Released</option>
                                <option value="prototype">Prototype</option>
                            </select>
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Cover Image</label>
                        <p class="text-xs text-gray-500 mb-4">
                            The cover image is used whenever (630 x 500) needs to link to your project.
                            Try to avoid any important content in the bottom right corner (315x250 recommended) 32:25
                            aspect ratio.
                        </p>

                        <div class="upload-zone rounded-lg p-8 text-center mb-4">
                            <div class="text-4xl mb-3">🖼️</div>

                            <input type="file" name="cover_image" id="cover-upload" class="hidden" accept="image/*">

                            <!-- button dengan text terpotong kalau panjang -->
                            <button type="button" id="upload-btn"
                                onclick="document.getElementById('cover-upload').click()"
                                class="btn-neon px-4 py-2 rounded-lg text-sm font-medium max-w-[250px] truncate">
                                <span id="upload-text" class="truncate">Upload Cover Image</span>
                            </button>

                            <div class="text-center">
                                <p class="text-xs text-gray-500 mt-2">Provide a link to YouTube</p>
                            </div>
                            <input type="url" class="form-input w-full px-3 py-2 rounded-lg mt-2 text-sm"
                                placeholder="eg. https://www.youtube.com/watch?v=1LsMrRf">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Screenshots Section -->
            <div class="form-card rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Screenshots</h3>
                <p class="text-sm text-gray-400 mb-4">Screenshots will appear on your game's page. Optional but highly
                    recommended. Upload 3 for best results.</p>

                <div class="upload-zone rounded-lg p-8 text-center">
                    <div class="text-4xl mb-3">📸</div>

                    <input type="file" name="screenshots[]" id="screenshots-upload" class="hidden" accept="image/*"
                        multiple>

                    <button type="button" onclick="document.getElementById('screenshots-upload').click()"
                        class="btn-neon px-6 py-3 rounded-lg font-medium">Add screenshots</button>
                </div>

            </div>

            <!-- Pricing Section -->
            <div class="form-card rounded-xl p-6">
                <h3 class="text-lg font-bold mb-6">Pricing</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <label class="pricing-option selected rounded-lg p-4 block">
                        <input type="radio" name="pricing" value="free" class="radio-custom" checked>
                        <span class="ml-3 font-medium">$0 or donate</span>
                    </label>
                    <label class="pricing-option rounded-lg p-4 block">
                        <input type="radio" name="pricing" value="paid" class="radio-custom">
                        <span class="ml-3 font-medium">Paid</span>
                    </label>
                    <label class="pricing-option rounded-lg p-4 block">
                        <input type="radio" name="pricing" value="no-payments" class="radio-custom">
                        <span class="ml-3 font-medium">No payments</span>
                    </label>
                </div>

                <p class="text-sm text-gray-400 mb-4">
                    Someone downloading your project will be asked for a donation before getting access.
                    They can skip to download for free.
                </p>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Suggested donation — Default donation
                        amount</label>
                    <input type="number" class="form-input w-32 px-4 py-2 rounded-lg" placeholder="$2.00" min="0"
                        step="0.01">
                </div>
            </div>

            <!-- Uploads Section -->
            <div class="form-card rounded-xl p-6">
                <h3 class="text-lg font-bold mb-6">Uploads</h3>

                <div class="space-y-4 mb-6">
                    <div class="flex items-center space-x-4">
                        <input type="file" name="game_file" id="game-files-upload" class="hidden"
                            accept=".zip,.rar,.7z">
                        <button type="button" onclick="document.getElementById('game-files-upload').click()"
                            class="btn-neon px-6 py-3 rounded-lg font-medium">Upload Game</button>
                    </div>

                    <div class="bg-gray-800/50 rounded-lg p-3 text-sm text-gray-300">
                        Use a folder to upload files: We recommend files in Zip format.
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="form-card rounded-xl p-6">
                <h3 class="text-lg font-bold mb-6">Details</h3>

                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Description — This will render as
                            the content of your game page</label>
                        <textarea name="description"
                            class="form-textarea w-full px-4 py-3 rounded-lg h-32 resize-vertical"
                            placeholder="Describe your game..." required></textarea>
                    </div>

                    <!-- Genre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Genre</label>
                        <p class="text-sm text-gray-400 mb-3">Select the category that best describes your game. You can
                            pick additional genres with tag below.</p>
                        <select class="form-select w-full px-4 py-3 rounded-lg" name="category_id">
                            <option value="">No genre</option>
                            <option value="1">Action</option>
                            <option value="2">Adventure</option>
                            <option value="3">Card Game</option>
                            <option value="4">Educational</option>
                            <option value="5">Fighting</option>
                            <option value="6">Platformer</option>
                            <option value="7">Puzzle</option>
                            <option value="8">Racing</option>
                            <option value="9">Rhythm</option>
                            <option value="10">Role Playing</option>
                            <option value="11">Shooter</option>
                            <option value="12">Simulation</option>
                            <option value="13">Sports</option>
                            <option value="14">Strategy</option>
                            <option value="15">Survival</option>
                        </select>

                    </div>

                    <!-- Visibility & Access -->
                    <div>
                        <h4 class="text-md font-bold mb-3">Visibility & access</h4>
                        <p class="text-sm text-gray-400 mb-4">Proyek akan segera diupload setelah direview. <a href="#"
                                class="text-blue-400 hover:underline">Learn more about other modes</a>.</p>

                        <div class="space-y-3">
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="visibility" value="restricted" class="radio-custom">
                                <span class="text-sm">Restricted — Only users & admins who can access the page</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="visibility" value="public-final" class="radio-custom">
                                <span class="text-sm">Public — Anyone can view the page; you can enable this after
                                    you've saved</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="btn-neon px-8 py-4 rounded-lg text-lg font-bold">Save & view page</button>
            </div>
        </form>
    </div>

    <script>
        // Platform selection
        document.querySelectorAll('.pricing-option').forEach(option => {
            option.addEventListener('click', function () {
                document.querySelectorAll('.pricing-option').forEach(o => o.classList.remove('selected'));
                this.classList.add('selected');
                this.querySelector('input[type="radio"]').checked = true;
            });
        });

        // File upload feedback
        document.getElementById('cover-upload').addEventListener('change', function (e) {
            if (e.target.files.length > 0) {
                const fullName = e.target.files[0].name;
                const uploadText = document.getElementById('upload-text');
                const uploadBtn = document.getElementById('upload-btn');

                // batasi max 25 huruf
                let shortName = fullName;
                if (fullName.length > 25) {
                    shortName = fullName.substring(0, 15) + "...";
                }

                uploadText.textContent = shortName;
                uploadBtn.title = fullName; // tooltip biar kelihatan full
                uploadBtn.classList.add('bg-green-600');
            }
        });

        document.getElementById('screenshots-upload').addEventListener('change', function (e) {
            if (e.target.files.length > 0) {
                const button = document.querySelector('[onclick="document.getElementById(\'screenshots-upload\').click()"]');
                button.textContent = `Selected: ${e.target.files.length} screenshots`;
                button.classList.add('bg-green-600');
            }
        });

        document.getElementById('game-files-upload').addEventListener('change', function (e) {
            if (e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                const button = document.querySelector('[onclick="document.getElementById(\'game-files-upload\').click()"]');
                button.textContent = `Selected: ${fileName}`;
                button.classList.add('bg-green-600');
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function (e) {
            const title = document.querySelector('input[name="title"]').value;
            const description = document.querySelector('textarea[name="description"]').value;
            const coverImage = document.getElementById('cover-upload').files.length;
            const gameFile = document.getElementById('game-files-upload').files.length;
            const genre = document.querySelector('select[name="category_id"]').value;

            if (!title.trim()) {
                e.preventDefault();
                alert('⚠️ Please enter a title for your game');
                return;
            }

            if (!description.trim()) {
                e.preventDefault();
                alert('⚠️ Please enter a description for your game');
                return;
            }

            if (coverImage === 0) {
                e.preventDefault();
                alert('⚠️ Please upload a cover image');
                return;
            }

            if (gameFile === 0) {
                e.preventDefault();
                alert('⚠️ Please upload your game file');
                return;
            }

            if (!genre.trim()) {
                e.preventDefault();
                alert('⚠️ Please select a genre');
                return;
            }
        });
    </script>

</body>

</html>