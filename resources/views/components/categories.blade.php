<div class="mt-8">
    <p class="text-gray-400 text-lg mb-2">Discover by topic</p>
    <h3 class="text-4xl font-bold mb-6 text-white">Categories</h3>

    <div class="grid grid-cols-2 gap-4">
        @foreach ($categories as $category)
            @php
                $categoryColor = '';
                $categoryHoverColor = '';

                switch (strtolower($category->category_name)) {
                    case 'news':
                        $categoryColor = 'bg-[#e94560]';
                        $categoryHoverColor = 'hover:bg-[#c2364e]';
                        break;
                    case 'podcast': // blue
                        $categoryColor = 'bg-[#4285F4]';
                        $categoryHoverColor = 'hover:bg-[#3367D6]';
                        break;
                    case 'review': // yellow
                        $categoryColor = 'bg-[#FFD700]';
                        $categoryHoverColor = 'hover:bg-[#E0B300]';
                        break;
                    case 'coverage': // orange
                        $categoryColor = 'bg-[#FF9800]';
                        $categoryHoverColor = 'hover:bg-[#F57C00]';
                        break;
                    case 'interview': // green
                        $categoryColor = 'bg-[#4CAF50]';
                        $categoryHoverColor = 'hover:bg-[#388E3C]';
                        break;
                    case 'commentary': // purple
                        $categoryColor = 'bg-[#9C27B0]';
                        $categoryHoverColor = 'hover:bg-[#7B1FA2]';
                        break;
                    default:
                        $categoryColor = 'bg-gray-500';
                        $categoryHoverColor = 'hover:bg-gray-300';
                        break;
                }
            @endphp

            <a href="{{ route('categories.show', $category->id) }}"
               class="block text-center text-white font-bold py-3 px-6 rounded-lg transition 
                      {{ $categoryColor }} {{ $categoryHoverColor }}">
                {{ $category->category_name }}
            </a>
        @endforeach
    </div>
</div>
