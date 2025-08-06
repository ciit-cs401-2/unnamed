<footer class="bg-[#24263b] py-10 mt-12"> {{-- Adjust background color --}}
    <div class="container mx-auto px-4 flex flex-col md:flex-row gap-8 text-white">
        <div class="col-span-1 md:col-span-2">
            <div class="flex items-center mb-4">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12 h-12 mr-3" />
                <span class="text-3xl font-bold">MoneyMinted Blogs</span>
            </div>
            <p class="text-gray-300 text-sm mb-4">At MoneyMinted, we believe that financial literacy isn’t just a skill 
                — it’s a superpower. Whether you're budgeting your first paycheck, navigating the stock market, or planning
                 for early retirement, our mission is to provide clear, actionable insights that help you take control of your
                  money and your future. Because when you understand your finances, you’re not just surviving — you’re thriving.</p>
            <div class="flex space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/30/ffffff/facebook-new.png" alt="Facebook"
                        class="w-8 h-8" />
                </a>
                <a href="https://instagram.com" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/30/ffffff/instagram-new--v1.png" alt="Instagram"
                        class="w-8 h-8" />
                </a>
                <a href="https://www.tiktok.com/@azefps_" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/30/ffffff/tiktok--v1.png" alt="Tiktok"
                        class="w-8 h-8" />
                </a>
                <a href="https://youtube.com" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/30/ffffff/youtube-play--v1.png" alt="Youtube"
                        class="w-8 h-8" />
                </a>
            </div>
        </div>

        <div>
            <h4 class="text-xl font-bold mb-4">Links</h4>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-[#e94560]">Homepage</a></li>
                <li><a href="#" class="hover:text-[#e94560]">Blog</a></li>
                <li><a href="{{route('about')}}" class="hover:text-[#e94560]">About</a></li>
                <li><a href="{{ route('contact.form') }}" class="hover:text-[#e94560]">Contact</a></li>
            </ul>
        </div>

        {{-- <div>
            <h4 class="text-xl font-bold mb-4">Tags</h4>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-[#e94560]">Style</a></li>
                <li><a href="#" class="hover:text-[#e94560]">Fashion</a></li>
                <li><a href="#" class="hover:text-[#e94560]">Coding</a></li>
                <li><a href="#" class="hover:text-[#e94560]">Travel</a></li>
            </ul>
        </div> --}}

        <div>
            <h4 class="text-xl font-bold mb-4">Social</h4>
            <ul class="space-y-2 text-gray-300">
                <li><a href="https://facebook.com" target="_blank" class="hover:text-[#e94560]">Facebook</a></li>
                <li><a href="https://instagram.com" target="_blank" class="hover:text-[#e94560]">Instagram</a></li>
                <li><a href="https://tiktok.com" target="_blank" class="hover:text-[#e94560]">Tiktok</a></li>
                <li><a href="https://youtube.com" target="_blank" class="hover:text-[#e94560]">Youtube</a></li>
            </ul>
        </div>
    </div>
</footer>