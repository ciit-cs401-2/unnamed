<!-- Swiper Container -->
<div class="swiper mySwiper max-w-5xl mx-auto">
  <div class="swiper-wrapper">
    @foreach ($featuredPosts as $post)
      @php
          $imageUrl = Str::startsWith($post->featured_image_url, ['http', 'https'])
              ? $post->featured_image_url
              : asset('storage/' . $post->featured_image_url);
      @endphp

      <div class="swiper-slide flex justify-center">
        <div class="bg-[#24263b] rounded-lg shadow-lg overflow-hidden md:flex max-h-[400px] w-[800px]">
          <div class="md:flex-shrink-0">
            <img class="h-full w-full object-cover md:w-96" src="{{ $imageUrl }}" alt="Featured Post Image">
          </div>
          <div class="p-8 flex flex-col justify-center">
            <h2 class="text-4xl font-bold mb-4 leading-tight text-white">{{ $post->title }}</h2>
            <p class="text-gray-300 text-lg mb-6">{{ Str::limit($post->content, 200) }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="text-[#e94560] hover:underline text-sm">
              Read More
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Swiper Navigation -->
  <div class="swiper-pagination"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<!-- Swiper CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  new Swiper(".mySwiper", {
    slidesPerView: 1.2, 
    centeredSlides: true, 
    spaceBetween: 20,
    loop: true,
    autoHeight: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
  });
</script>

<style>
  .swiper-slide > div {
    max-height: 400px;  
    height: 400px;
  }

  .swiper-slide {
    transition: all 0.3s ease;
    opacity: 0.4;
    transform: scale(0.95);
  }

  .swiper-slide-active {
    opacity: 1 !important;
    transform: scale(1);
  }
</style>
