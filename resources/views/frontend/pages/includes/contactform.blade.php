<section class="section" id="contact" style="background: var(--bg-light);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ $page->title ?? 'Contact Us' }}</h2>
            <p class="section-subtitle">
                {{ $page->description ?? 'Get in touch with our team for inquiries or collaboration opportunities' }}
            </p>
        </div>

        <div class="contact-grid">
            <div class="contact-info">
                <h3 style="margin-bottom: 2rem; color: var(--white);">{{ get_phrase('Get In Touch') }}</h3>

                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4>{{ get_phrase('Office Address') }}</h4>
                        <p>
                            {{ get_settings('office_address') ?? 'Project Management Unit (PMU)' }}<br>
                            {{ get_settings('address_line_1') ?? 'Kamalamai Municipality-6'}},<br>
                            {{ get_settings('address_line_2') ?? 'Shantinagar, Sindhuli Madi'}}
                        </p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4>{{ get_phrase("Office Hours") }}</h4>
                        <p>
                            {{ get_settings('office_hours') ?? 'Sunday – Thursday: 10:00 AM – 5:00 PM' }}<br>
                            {{ get_settings('office_hours_line_1') ?? 'Friday: 10:00 AM – 3:00 PM' }}<br>
                            {{ get_phrase('Saturday: Closed') }}
                        </p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h4>{{ get_phrase('Phone') }}</h4>
                        <p>{{ get_settings('contact_no') ?? '+977-47-590009'}}</p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>{{ get_phrase('Email') }}</h4>
                        <p>{{ get_settings('contact_email') ??
                            'mawrin.mofe@bagamati.gov.np' }}</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);">Send Message</h3>
                <form id="contactForm" action="{{ route('contact-messages.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{get_phrase('Full Name')}} *</label>
                        <input type="text" class="form-input" name="full_name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ get_phrase('Email Address') }} *</label>
                        <input type="email" class="form-input" name="email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ get_phrase('Organization') }}</label>
                        <input type="text" class="form-input" name="organization">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ get_phrase('Subject') }} *</label>
                        <input type="text" class="form-input" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ get_phrase('Message') }} *</label>
                        <textarea class="form-textarea" name="message" required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        {{ get_phrase('Send Message') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>