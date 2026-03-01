<footer class="mt-16 border-t" style="border-color: var(--border);">
  <div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 lg:grid-cols-4 lg:px-8">
    <section>
      <h3 class="text-xl font-extrabold">Prime Scholar Coaching</h3>
      <p class="mt-3 text-sm text-muted">Smart coaching for SSC, HSC, Admission. শিখি ধারণা থেকে, শুধু মুখস্থ না।</p>
      <div class="mt-4 space-y-2 text-sm">
        <p><strong>Hotline:</strong> +880 1700-000000</p>
        <p><strong>Email:</strong> hello@primescholar.edu.bd</p>
      </div>
      <div class="mt-4 flex gap-2">
        <a href="#" class="btn btn-outline p-2" aria-label="Facebook">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook">
            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
          </svg>
        </a>
        <a href="#" class="btn btn-outline p-2" aria-label="YouTube">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube">
            <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.95C18.88 4 12 4 12 4s-6.88 0-8.59.47A2.78 2.78 0 0 0 1.95 6.42C1.48 8.13 1.48 12 1.48 12s0 3.87.47 5.58a2.78 2.78 0 0 0 1.95 1.95C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 0 0 1.95-1.95c.47-1.71.47-5.58.47-5.58s0-3.87-.47-5.58z"></path>
            <polygon points="9.75,15.02 15,12 9.75,8.98"></polygon>
          </svg>
        </a>
        <a href="#" class="btn btn-outline p-2" aria-label="LinkedIn">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin">
            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2h-4v9h-4v-16h4v2a4 4 0 0 1 3.5-2z"></path>
            <rect x="2" y="9" width="4" height="12"></rect>
            <circle cx="4" cy="4" r="2"></circle>
          </svg>
        </a>
      </div>
    </section>

    <section>
      <h4 class="text-lg font-bold">Dhaka Branches</h4>
      <ul class="mt-3 space-y-2 text-sm text-muted">
        <li>Dhanmondi 27, Dhaka</li>
        <li>Mirpur 10, Dhaka</li>
        <li>Uttara Sector 7, Dhaka</li>
        <li>Farmgate, Dhaka</li>
      </ul>
      <a href="contact.html" class="mt-4 inline-flex text-sm font-semibold" style="color: var(--primary);">View all branches</a>
    </section>

    <section>
      <h4 class="text-lg font-bold">Newsletter</h4>
      <p class="mt-3 text-sm text-muted">Weekly routine + notice update পেতে email দিন।</p>
      <form class="needs-validation mt-4 space-y-3" aria-label="Newsletter form">
        <label class="sr-only" for="newsletterEmail">Email</label>
        <input id="newsletterEmail" class="input" type="email" placeholder="guardian@email.com" required />
        <p class="field-error">Email is required</p>
        <button class="btn btn-primary w-full" type="submit">Subscribe</button>
      </form>
    </section>

    <section>
      <h4 class="text-lg font-bold">Campus Map</h4>
      <div class="map-placeholder mt-3 text-center text-sm">
        <iframe class="map-embed" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7303.812181652402!2d90.38687900000001!3d23.750728!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9ac5fce59cb%3A0xfd3e17cbaa2f7805!2sKaizen%20IT%20Ltd.!5e0!3m2!1sen!2sbd!4v1772046087568!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
  </div>

  <div class="border-t py-4 text-center text-sm text-muted" style="border-color: var(--border);">
    <p>&copy; <span data-current-year></span> Prime Scholar Coaching. All rights reserved. | <a href="terms.html" class="hover:underline">Terms & Privacy</a></p>
  </div>
</footer>

<div id="toast" class="toast" role="status" aria-live="polite">
  <span id="toastMessage">Success</span>
</div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
  <script src="{{ asset('frontend') }}/js/main.js"></script>
</body>
</html>
