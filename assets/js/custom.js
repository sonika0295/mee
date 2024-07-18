$(document).ready(function () {
  $(".carousel").carousel();

  experienceDiv();
});

function experienceDiv() {
  var exp = `<div class="experience-item">
 <h4>Software Developer</h4>
 <h5>Nov, 2022 - Feb, 2024</h5>
 <p>
     <em>HackerKernel, Bhopal(MP), India</em>
 </p>
 <ul>
     <li>Led full-stack development in a service-based company, managing diverse projects.
         Executed frontend tasks using HTML/CSS and EJS with Node for dynamic content.</li>
     <li>Engineered a payment application, creating Laravel APIs for seamless integration of
         Stripe, PayPal, Ding, and Reloadly for efficient customer transactions, including
         mobile recharge services.</li>
     <li>Specialized in web scraping using Puppeteer, Crawlee, and Apify, extracting data
         from various websites. Contributed to projects like HelptoChoose, BrandChoose, and
         ActivityBreeze, ensuring impactful development contributions.</li>
 </ul>
</div>`;

  var edu = `<div class="experience-item">
<h4>Bachelor of Science (PCM)</h4>
<h5>2019 - 2022</h5>
<p>
    <em>Barkatullah University (BU), Bhopal</em>
</p>
<p>I have successfully attained a Bachelor of Science degree with a specialization in
    Physics, Chemistry, and Mathematics (PCM).</p>
</div>`;

  if ($(window).width() <= 768) {
    $(".col-lg-6.exp-1").append(exp);
    $(".col-lg-6.edu-1").append(edu);
  } else {
    $(".col-lg-6.exp-2").removeClass('d-block');
    $(".col-lg-6.exp-2").append(exp);
    $(".col-lg-6.edu-2").removeClass('d-block');
    $(".col-lg-6.edu-2").append(edu);
  }
}
