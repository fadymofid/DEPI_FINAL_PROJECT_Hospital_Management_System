
$('document').ready(function() {
  $('#doctorSlideshow').owlCarousel({
    nav: true,
    dots: false,
    navText: ["<span class='mai-arrow-back'></span>", "<span class='mai-arrow-forward'></span>"],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  });
});

$('document').ready(function() {
  $("a[data-role='smoothscroll']").click(function(e) {
    e.preventDefault();

    var position = $($(this).attr("href")).offset().top - nav_height;

    $("body, html").animate({
        scrollTop: position
    }, 1000 );
    return false;
  });
});

$('document').ready(function() {
  // Back to top
  var backTop = $(".back-to-top");

  $(window).scroll(function() {
    if($(document).scrollTop() > 400) {
      backTop.css('visibility', 'visible');
    }
    else if($(document).scrollTop() < 400) {
      backTop.css('visibility', 'hidden');
    }
  });

  backTop.click(function() {
    $('html').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
});


$('document').ready(function() {
  // Tooltips
  $('[data-toggle="tooltip"]').tooltip();

  // Popovers
  $('[data-toggle="popover"]').popover();

  // Page scroll animate
  new WOW().init();
});

document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch counts
    async function fetchCounts() {
        try {
            const response = await fetch('/api/getCounts'); // Replace with your API endpoint
            const data = await response.json();

            // Update the counters with the fetched data
            document.getElementById('userCount').textContent = data.users || 0;
            document.getElementById('doctorCount').textContent = data.doctors || 0;
            document.getElementById('appointmentCount').textContent = data.appointments || 0;

            // Optional: Add animations or transitions for the counters
            animateCounter('userCount', data.users);
            animateCounter('doctorCount', data.doctors);
            animateCounter('appointmentCount', data.appointments);
        } catch (error) {
            console.error('Error fetching counts:', error);
        }
    }

    // Function to animate the counter
    function animateCounter(elementId, endValue) {
        let startValue = 0;
        const duration = 1000; // duration in milliseconds
        const stepTime = Math.abs(Math.floor(duration / endValue));
        const element = document.getElementById(elementId);

        const timer = setInterval(function() {
            startValue += 1;
            element.textContent = startValue;

            if (startValue === endValue) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    // Fetch counts on page load
    fetchCounts();
});
