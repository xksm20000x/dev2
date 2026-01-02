<footer>
    <p>Copyright &copy; 2025 GSK. All Rights Reserved.</p>
    <p>주소: 경기 고양시 덕양구 344 | 대표전화: 02-1234-5678</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>

    function runSimultaneousBanner() {
        const $ko = $('#text-ko');
        const $en = $('#text-en');

        // 초기 위치 설정 (한글은 왼쪽 밖, 영어는 오른쪽 밖)
        $ko.css({ left: '-10%', opacity: 0 });
        $en.css({ left: '10%', opacity: 0 });

        // --- 동시에 중앙으로 이동 ---
        $ko.animate({ left: '0', opacity: 1 }, 1000);
        $en.animate({ left: '0', opacity: 1 }, 1000);

        // --- 3초간 머물렀다가 동시에 사라지기 ---
        setTimeout(function() {
            $ko.animate({ left: '10%', opacity: 0 }, 1200);
            $en.animate({ left: '-10%', opacity: 0 }, 1200, function() {
                // 애니메이션이 완전히 끝나면 재시작
                //runSimultaneousBanner();

            });
        }, 3000);
    }

    $(document).ready(function() {

        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 0,
            loop: true, // 무한 루프
            allowTouchMove: false,
            effect: 'fade',
            speed: 3000,
            fadeEffect: {
                crossFade: true,
            },
            autoplay: { // 자동 롤링 설정
                delay: 3000, // 3초마다 전환
                disableOnInteraction11: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // 2. 모바일 햄버거 메뉴 토글 기능
        $('.hamburger-menu').on('click', function() {
            $('.mobile-menu').toggleClass('active');
        });

        // 모바일 메뉴 항목 클릭 시 메뉴 닫기
        $('.mobile-menu a').on('click', function() {
            $('.mobile-menu').removeClass('active');
        });

        // 3. 상담 폼 제출 이벤트 핸들러 (실제 서버 연동은 백엔드에서 처리 필요)
        $('.contact-form').on('submit', function(e) {
            e.preventDefault();
            alert('상담 신청이 완료되었습니다. 곧 연락드리겠습니다.');
            // 실제 서버 전송 로직 (Ajax 등)을 여기에 추가합니다.
            // this.submit(); // 실제로 폼을 전송하려면 주석 해제
        });

        $('.section-title').on('click',function(){

            var pt_id = $(this).parent('section').attr('id');
            var goto_url;

            switch(pt_id){
                case 'notice' :
                    goto_url = '{{ route('posts.index') }}';
                break;
            }

            location.href= goto_url;

        });

        runSimultaneousBanner();
        
    });
</script>
</body>
</html>