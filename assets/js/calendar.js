document.addEventListener('DOMContentLoaded', function () {
    let today;
    let swiper;
    let currentMonth;

    today = new Date();
    currentMonth = today.getMonth();

    swiper = new Swiper('#calendar-swiper', {
        slidesPerView: 10,
        centeredSlides: true,
        spaceBetween: 10,
        direction: 'horizontal',
        initialSlide: 0,
        hashNavigation: true,
    });

    const countedDates = [
        new Date(today.getFullYear(), today.getMonth(), 3)
    ];

    function createCalendar() {
        const daysToShowBefore = 7;
        const daysToShowAfter = 7;

        const calendarDays = [];

        for (let i = daysToShowBefore; i > 0; i--) {
            const date = new Date(today.getFullYear(), currentMonth, today.getDate() - i);
            calendarDays.push(date);
        }

        for (let i = 0; i < 2 * daysToShowBefore + 1; i++) {
            const date = new Date(today.getFullYear(), currentMonth, today.getDate() - daysToShowBefore + i);
            calendarDays.push(date);
        }

        for (let i = 1; i <= daysToShowAfter; i++) {
            const date = new Date(today.getFullYear(), currentMonth, today.getDate() + i);
            calendarDays.push(date);
        }

        document.getElementById('calendar').innerHTML = '';

        calendarDays.forEach(date => {
            const isCounted = countedDates.some(countedDate => countedDate.toDateString() === date.toDateString());
            const isToday = date.toDateString() === today.toDateString();

            const dayElement = document.createElement('div');
            dayElement.classList.add('swiper-slide');
            dayElement.textContent = date.getDate();

            if (isToday) {
                dayElement.classList.add('today');
            }

            if (isCounted) {
                dayElement.classList.add('counted');
            }

            // dayElement.addEventListener('click', () => toggleCounted(date));

            swiper.appendSlide(dayElement);
        });

        swiper.update();
        swiper.slideTo(swiper.slides.length - 1, 0, false); // Mevcut günün ilk swipe'ın sonunda olmasını sağla
    }

    // function toggleCounted(date) {
    //     const index = countedDates.findIndex(countedDate => countedDate.toDateString() === date.toDateString());

    //     if (index === -1) {
    //         countedDates.push(date);
    //     } else {
    //         countedDates.splice(index, 1);
    //     }

    //     createCalendar();
    // }

    createCalendar();
});
