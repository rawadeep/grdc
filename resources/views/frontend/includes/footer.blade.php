<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Contact Info -->
            <div class="footer-section">
                <h3>{{ get_phrase('Contact for Further Information') }}</h3>
                <ul class="footer-links">
                    <li>{{ get_settings('office_address') ?? 'Project Management Unit (PMU)' }}</li>
                    <li>{{ get_settings('address_line_1') ?? 'Kamalamai Municipality-6'}},</li>
                    <li>{{ get_settings('address_line_2') ?? 'Shantinagar, Sindhuli Madi'}}</li>
                    <li><i class="fas fa-phone"></i> {{ get_settings('contact_no') ?? '+977-47-590009'}}</li>
                    <li><i class="fas fa-envelope"></i> {{ get_settings('contact_email') ??
                        'mawrin.mofe@bagamati.gov.np' }}</li>
                    <li><i class="fas fa-clock"></i> {{ get_phrase('Office Hours') }}</li>
                    <li>{{ get_settings('office_hours') ?? 'Sunday – Thursday: 10:00 AM – 5:00 PM' }}</li>
                    <li>{{ get_settings('office_hours_line_1') ?? 'Friday: 10:00 AM – 3:00 PM' }}</li>
                </ul>
                <a href="{{ url('contact-us') }}" class="contact-link">
                    {{ get_phrase('Contact Us') }} &#10138;
                </a>
            </div>

            <!-- Project Manager -->
            <div class="footer-section">
                <h3>{{ get_settings('title_1') ?? 'Project Manager' }}</h3>
                <ul class="footer-links">
                    <li style="display: flex; align-items: center; list-style: none;">
                        <div style="width: 80px; height: 80px; margin-right: 10px; overflow: hidden; flex-shrink: 0;">
                            <img src="{{ asset('frontend/theme/img/profile-pic-suresh-dahal.jpeg') }}"
                                alt="Profile Picture"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        </div>
                        <div style="margin: 0;">
                            <h5 style="margin: 0;">{{ get_settings('person_1') ?? 'Mr. Suresh Dahal' }}</h5>
                            <p style="margin: 0; font-size: 0.9rem;">{{ get_settings('person_detail_1') }}</p>
                        </div>
                    </li>
                </ul>
                <h3>{{ get_settings('title_2') ?? 'Information Officer' }}</h3>
                <ul class="footer-links">
                    <li style="display: flex; align-items: center; list-style: none;">
                        <div style="width: 80px; height: 80px; margin-right: 10px; overflow: hidden; flex-shrink: 0;">
                            <img src="{{ asset('frontend/theme/img/profile-pic-nabin-dhungana.jpeg') }}"
                                alt="Profile Picture"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        </div>
                        <div style="margin: 0;">
                            <h5 style="margin: 0;">{{ get_settings('person_2') ?? 'Nabin Dhungana, PhD' }}</h5>
                            <p style="margin: 0; font-size: 0.9rem;">{{ get_settings('person_detail_2') ?? 'Technical 
                                Team Leader, MaWRiN Project, Sindhuli, Phone: 9705033741' }}</p>
                            @if(get_settings('person_2_phone_number'))
                                <p style="margin: 0; font-size: 0.9rem;"><i class="fas fa-phone"></i> {{ get_settings('person_2_phone_number') }}</p>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Partners -->
            <div class="footer-section">
                <h3>{{ get_phrase('Relevant Links') }}</h3>
                <ul class="footer-links">
                    @php
                        $footerLinks = [];
                        $footerLinksRaw = get_settings('footer_links');
                        if (!empty($footerLinksRaw)) {
                            $footerLinks = json_decode($footerLinksRaw, true) ?? [];
                        }
                    @endphp
                    @foreach ($footerLinks as $link)
                        <li>
                            <a href="{{ $link['url'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
                                {{ $link['title'] ?? '' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; {{ get_settings('copyright_text') ?? '2025 MaWRiN Project. All rights reserved'}}</p>
        </div>
    </div>
</footer>