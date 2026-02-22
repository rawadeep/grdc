<x-layouts.frontend>

  <div class="container">
    <section class="section">
      <h2 class="section-title">Photo Gallery</h2>
      @if ($gallery_images->count() > 0)
      <div class="gallery-grid" id="galleryGrid">
        @foreach ($gallery_images as $item)
        <div class="gallery-item" data-src="{{ asset('uploads/media/' . $item->filename) }}"
          data-caption="{{ $item->name }}">
          <img src="{{ asset('uploads/media/' . $item->filename) }}" alt="{{ $item->name }}" class="gallery-img" />
        </div>
        @endforeach
      </div>
      @else
      <div class="gallery-grid" id="galleryGrid">
        <!-- Sample Gallery Items -->
        <div class="gallery-item" data-src="{{ asset('frontend/theme/img/1.jpg') }}"
          data-caption="Community Training on Climate Risks">
          <img src="{{ asset('frontend/theme/img/1.jpg') }}" alt="Gallery Image 1" class="gallery-img" />
        </div>
        <div class="gallery-item" data-src="{{ asset('frontend/theme/img/2.jpg') }}"
          data-caption="Nature-based Solutions in Action">
          <img src="{{ asset('frontend/theme/img/2.jpg') }}" alt="Gallery Image 2" class="gallery-img" />
        </div>
        <div class="gallery-item" data-src="{{ asset('frontend/theme/img/3.jpg') }}"
          data-caption="Youth Engagement in Watershed Management">
          <img src="{{ asset('frontend/theme/img/3.jpg') }}" alt="Gallery Image 3" class="gallery-img" />
        </div>
        <div class="gallery-item" data-src="{{ asset('frontend/theme/img/4.jpg') }}"
          data-caption="Multi-Stakeholder Platform Meeting">
          <img src="{{ asset('frontend/theme/img/4.jpg') }}" alt="Gallery Image 4" class="gallery-img" />
        </div>
        <div class="gallery-item" data-src="{{ asset('frontend/theme/img/5.jpg') }}"
          data-caption="Reforestation Efforts in Degraded Areas">
          <img src="{{ asset('frontend/theme/img/5.jpg') }}" alt="Gallery Image 5" class="gallery-img" />
        </div>
        <div class="gallery-item" data-src="{{ asset('frontend/theme/img/6.jpg') }}"
          data-caption="Rainwater Harvesting Demonstration">
          <img src="{{ asset('frontend/theme/img/6.jpg') }}" alt="Gallery Image 6" class="gallery-img" />
        </div>
      </div>
      @endif
    </section>
  </div>

  <x-modals.image-modal-alt />

  @push('scripts')
  <script>
    const galleryItems = document.querySelectorAll('.gallery-item');
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeBtn = document.getElementById('closeBtn');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
    
        let currentIndex = 0;
        let imageSources = [];
    
        // Initialize gallery data
        galleryItems.forEach((item, index) => {
          item.addEventListener('click', () => {
            currentIndex = index;
            imageSources = Array.from(galleryItems).map(i => i.dataset.src);
            modalImg.src = imageSources[currentIndex];
            modal.classList.add('active');
          });
        });
    
        // Close modal
        closeBtn.addEventListener('click', () => {
          modal.classList.remove('active');
        });
    
        // Next image
        nextBtn.addEventListener('click', () => {
          currentIndex = (currentIndex + 1) % imageSources.length;
          modalImg.src = imageSources[currentIndex];
        });
    
        // Previous image
        prevBtn.addEventListener('click', () => {
          currentIndex = (currentIndex - 1 + imageSources.length) % imageSources.length;
          modalImg.src = imageSources[currentIndex];
        });
    
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
          if (!modal.classList.contains('active')) return;
    
          if (e.key === 'ArrowRight') {
            nextBtn.click();
          } else if (e.key === 'ArrowLeft') {
            prevBtn.click();
          } else if (e.key === 'Escape') {
            closeBtn.click();
          }
        });
    
        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;
    
        modalImg.addEventListener('touchstart', e => {
          touchStartX = e.changedTouches[0].screenX;
        }, false);
    
        modalImg.addEventListener('touchend', e => {
          touchEndX = e.changedTouches[0].screenX;
          handleSwipe();
        }, false);
    
        function handleSwipe() {
          const swipeThreshold = 50;
          const swipeDistance = touchEndX - touchStartX;
    
          if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0) {
              prevBtn.click(); // Swipe right → previous
            } else {
              nextBtn.click(); // Swipe left → next
            }
          }
        }
  </script>
  @endpush
</x-layouts.frontend>