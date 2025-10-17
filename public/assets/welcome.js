document.addEventListener('DOMContentLoaded', () => {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('#mobile-menu a').forEach((link) => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 },
    );

    document.querySelectorAll('.animate-fade-in').forEach((element) => {
        observer.observe(element);
    });

    if (typeof Swiper !== 'undefined') {
        new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });
    }

    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotWindow = document.getElementById('chatbot-window');
    const chatbotClose = document.getElementById('chatbot-close');
    const chatbotForm = document.getElementById('chatbot-form');
    const chatbotInput = document.getElementById('chatbot-input');
    const chatbotMessages = document.getElementById('chatbot-messages');

    if (chatbotToggle && chatbotWindow && chatbotClose && chatbotForm && chatbotInput && chatbotMessages) {
        chatbotToggle.addEventListener('click', () => {
            chatbotWindow.classList.toggle('hidden');
        });

        chatbotClose.addEventListener('click', () => {
            chatbotWindow.classList.add('hidden');
        });

        chatbotForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            const userInput = chatbotInput.value.trim();
            if (!userInput) {
                return;
            }

            appendMessage(userInput, 'user');
            chatbotInput.value = '';

            showLoadingIndicator();

            try {
                const botResponse = await getGeminiResponse(userInput);
                removeLoadingIndicator();
                appendMessage(botResponse, 'bot');
            } catch (error) {
                removeLoadingIndicator();
                appendMessage('Maaf, terjadi kesalahan. Silakan coba lagi nanti.', 'bot');
                console.error('Error fetching Gemini response:', error);
            }
        });
    }

    function appendMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('flex', 'mb-4', 'chat-message-animation');

        const messageBubble = document.createElement('div');
        messageBubble.textContent = text;

        if (sender === 'user') {
            messageDiv.classList.add('justify-end');
            messageBubble.classList.add('bg-red-600', 'text-white', 'p-3', 'rounded-lg', 'rounded-br-none', 'max-w-xs');
        } else {
            messageBubble.classList.add('bg-gray-200', 'text-gray-800', 'p-3', 'rounded-lg', 'rounded-bl-none', 'max-w-xs');
        }

        messageDiv.appendChild(messageBubble);
        chatbotMessages.appendChild(messageDiv);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    function showLoadingIndicator() {
        const loadingDiv = document.createElement('div');
        loadingDiv.id = 'loading-indicator';
        loadingDiv.classList.add('flex', 'mb-4');
        loadingDiv.innerHTML = '<div class="bg-gray-200 text-gray-800 p-3 rounded-lg rounded-bl-none max-w-xs"><div class="flex items-center space-x-2"><div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: -0.3s;"></div><div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: -0.15s;"></div><div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce"></div></div></div>';
        chatbotMessages.appendChild(loadingDiv);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    function removeLoadingIndicator() {
        const indicator = document.getElementById('loading-indicator');
        if (indicator) {
            indicator.remove();
        }
    }

    async function getGeminiResponse(userQuery) {
        const apiKey = '';
        const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-09-2025:generateContent?key=${apiKey}`;

        const systemPrompt = 'Anda adalah asisten AI yang ramah dan membantu untuk SMKN 1 Surabaya, sebuah sekolah menengah kejuruan teknologi di Surabaya, Indonesia. Tugas Anda adalah menjawab pertanyaan dari calon siswa, orang tua, atau siapa pun yang tertarik dengan sekolah. Berikan jawaban yang ringkas dan informatif dalam Bahasa Indonesia. Jika Anda tidak tahu jawabannya, katakan bahwa Anda tidak memiliki informasi tersebut dan sarankan untuk menghubungi sekolah langsung di (031) 8292021. Informasi kunci tentang sekolah:\\n- Nama: SMKN 1 Surabaya\\n- Lokasi: Jl. Smea No.4, Wonokromo, Surabaya, Jawa Timur 60243\\n- Jurusan Unggulan: Rekayasa Perangkat Lunak (RPL), Teknik Komputer & Jaringan (TKJ), Multimedia & Desain Grafis, Teknik Elektronika Industri (TEI), Teknik Pemesinan, Teknik Otomotif, Teknik Bisnis Konstruksi & Properti (TBKP), Akuntansi & Keuangan Lembaga (AKL), dan Bisnis Daring & Pemasaran (BDPM).';

        const payload = {
            systemInstruction: {
                parts: [{ text: systemPrompt }],
            },
            contents: [
                {
                    parts: [{ text: userQuery }],
                },
            ],
        };

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
        });

        if (!response.ok) {
            throw new Error(`API request failed with status ${response.status}`);
        }

        const result = await response.json();
        let text = result.candidates?.[0]?.content?.parts?.[0]?.text;
        text = text ? text.trim() : null;

        if (!text) {
            throw new Error('Invalid or empty response structure from API.');
        }

        return text;
    }
});
