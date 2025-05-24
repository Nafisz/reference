        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.dataset.filter;

                // Filter gallery items
                galleryItems.forEach((item, index) => {
                    const category = item.dataset.category;
                    
                    if (filter === 'all' || category === filter) {
                        item.style.display = 'block';
                        item.style.animation = `fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s forwards`;
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // Modal functionality
        const modal = document.getElementById('modal');
        const modalImg = document.getElementById('modal-img');
        const modalClose = document.querySelector('.modal-close');

        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const img = item.querySelector('img');
                modalImg.src = img.src;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        modalClose.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = 'none';
            }
        });

        // Parallax effect for hero
        window.addEventListener('scroll', () => {
            const hero = document.querySelector('.hero');
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });