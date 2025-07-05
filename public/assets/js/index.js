 function toggleFAQ(element) {
    const answer = element.nextElementSibling;
    const icon = element.querySelector('.icon');
    const isOpen = answer.style.display === 'block';

    // Close all open answers
    document.querySelectorAll('.faq-answer').forEach(ans => ans.style.display = 'none');
    document.querySelectorAll('.faq-question .icon').forEach(icn => icn.innerText = '+');

    // Toggle current
    if (!isOpen) {
      answer.style.display = 'block';
      icon.innerText = '-';
    }
  }



document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".counter");
  let hasCounted = false;

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !hasCounted) {
        hasCounted = true;
        counters.forEach(counter => {
          const target = parseFloat(counter.getAttribute("data-target"));
          const suffix = counter.getAttribute("data-suffix") || "";
          const isDecimal = target % 1 !== 0;
          let current = 0;
          const increment = target / 200;

          function updateCounter() {
            current += increment;
            if (current < target) {
              counter.textContent = isDecimal
                ? current.toFixed(1) + suffix
                : Math.floor(current).toLocaleString() + suffix;
              requestAnimationFrame(updateCounter);
            } else {
              counter.textContent = isDecimal
                ? target.toFixed(1) + suffix
                : Math.floor(target).toLocaleString() + suffix;
            }
          }

          updateCounter();
        });
        observer.disconnect(); // stop observing once done
      }
    });
  }, { threshold: 0.3 }); // trigger when 30% of the section is visible

  const section = document.querySelector("#click");
  if (section) {
    observer.observe(section);
  }
});



  
  window.addEventListener('load', function () {
    AOS.init({
      once: true,
      duration: 3000
    });
  });

document.getElementById("currentYear").textContent = new Date().getFullYear();


  AOS.init({
    duration: 800,
    once: true
  });
  console.log("AOS initialized");




  

