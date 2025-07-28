<div class="mt-8">
    <p class="text-gray-400 text-lg mb-2">What's hot</p>
    <h3 class="text-4xl font-bold mb-6 text-white">Most Popular</h3>

    <div class="space-y-6">
        @foreach ($mostPopular as $post)
            <a href="{{ route('posts.show', $post->id) }}" class="block">
                <div class="bg-[#24263b] p-4 rounded-lg shadow-md hover:scale-[1.02] transition-transform duration-200">
                    <span class="text-white text-xs font-semibold px-2.5 py-0.5 rounded
                        @php
                            $categoryColor = match(strtolower($post->categories()->first()->category_name)) {
                                'news' => 'bg-[#e94560]',
                                'podcast' => 'bg-[#4285F4]',
                                'review' => 'bg-[#FFD700]',
                                'coverage' => 'bg-[#FF9800]',
                                'interview' => 'bg-[#4CAF50]',
                                'commentary' => 'bg-[#9C27B0]',
                                default => 'bg-gray-500',
                            };
                            echo $categoryColor;
                        @endphp
                    ">
                        {{ $post->categories()->first()->category_name }}
                    </span>

                    <h4 class="text-xl font-bold mt-2 text-white">{{ $post->title }}</h4>
                    <p class="text-gray-400 text-sm">
                        {{ $post->user->name }} - {{ date('d.m.Y', strtotime($post->publication_date)) }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
