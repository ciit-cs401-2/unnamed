<div class="mt-8">
    <p class="text-gray-400 text-lg mb-2">What's hot</p>
    <h3 class="text-4xl font-bold mb-6 text-white">Most Popular</h3>

    <div class="space-y-6">
        @foreach ($mostPopular as $post)
        <div class="bg-[#24263b] p-4 rounded-lg shadow-md"> {{-- Adjust background color --}}
            <span class="text-white text-xs font-semibold px-2.5 py-0.5 rounded
                @php
                    $categoryColor = '';
                    switch(strtolower($post->categories()->first()->category_name)) {
                        case 'news':
                            $categoryColor = 'bg-[#e94560]';
                            break;
                        case 'podcast':
                            $categoryColor = 'bg-[#4285F4]';
                            break;
                        case 'review':
                            $categoryColor = 'bg-[#FFD700]';
                            break;
                        case 'coverage':
                            $categoryColor = 'bg-[#FF9800]';
                            break;
                        case 'interview':
                            $categoryColor = 'bg-[#4CAF50]';
                            break;
                        case 'commentary':
                            $categoryColor = 'bg-[#9C27B0]';
                            break;
                        default:
                            $categoryColor = 'bg-gray-500';
                            break;
                    }
                    echo $categoryColor;
                @endphp
                ">{{$post->categories()->first()->category_name}}</span>
            <h4 class="text-xl font-bold mt-2 text-white">{{$post->title}}</h4>
            <p class="text-gray-400 text-sm">{{$post->user->name}} -
                {{date('d.m.Y', strtotime($post->publication_date)) }}</p>
        </div>
        @endforeach
    </div>
</div>