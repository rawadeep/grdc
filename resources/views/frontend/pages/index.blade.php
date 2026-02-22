<x-layouts.frontend>

    <!-- Hero Section with Slider -->
    <section class="hero" id="home">
        <div class="hero-slider" id="heroSlider">
            @if( $sliders->count() > 0 )
            @foreach ($sliders as $k => $item)
            <div class="hero-slide {{ $k == 0 ? 'active' : '' }}"
                style="background-image: url('{{ get_image('uploads/sliders/' . $item->image) }}')">
            </div>
            @endforeach
            @else
            <div class="hero-slide" style="background-image: url( {{ asset('frontend/theme/img/2.jpg') }} )"></div>
            <div class="hero-slide" style="background-image: url( {{ asset('frontend/theme/img/3.jpg') }} )"></div>
            <div class="hero-slide" style="background-image: url( {{ asset('frontend/theme/img/4.jpg') }} )"></div>
            <div class="hero-slide" style="background-image: url( {{ asset('frontend/theme/img/5.jpg') }} )"></div>
            @endif
        </div>

        <button class="hero-arrow prev" id="prevSlide">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="hero-arrow next" id="nextSlide">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="hero-navigation" id="heroNavigation">
            @forelse ($sliders as $k => $item)
            <div class="hero-dot {{ $k == 0 ? 'active' : '' }}" data-slide="{{ $k }}"></div>
            @empty
            <div class="hero-dot active" data-slide="0"></div>
            <div class="hero-dot" data-slide="1"></div>
            <div class="hero-dot" data-slide="2"></div>
            <div class="hero-dot" data-slide="3"></div>
            <div class="hero-dot" data-slide="4"></div>
            @endforelse
        </div>

    </section>

    <!-- Main Content -->
    <main>
        @php
        $section1 = $sections->where('id', 1)->first();
        $section2 = $sections->where('id', 2)->first();
        $section3 = $sections->where('id', 3)->first();
        $section4 = $sections->where('id', 4)->first();
        $section5 = $sections->where('id', 5)->first();
        @endphp
        <!-- About MaWRiN Project -->
        <section class="section" style="background: var(--bg-light);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $section1->title ?? 'MaWRiN Project' }}</h2>
                    <div class="paragraph">
                        {!! $section1->description ?? 'Climate change emerges as one of the biggest
                        challenges to prosperity and sustainable
                        development in Nepal. As a least developed
                        country with a high poverty rate of 18.7% and
                        a predominantly agrarian economy mainly
                        influenced by the monsoon, Nepal is highly
                        vulnerable to climate change. Nepal’s rugged
                        topography and fragile geology also render it
                        vulnerable to climate change. Mountain
                        ecosystems are inherently prone to natural
                        hazards, and climate change has exacerbated
                        their intensity and frequency in the recent
                        years. Current changes in the climate and its
                        variability directly impact the hydrological
                        cycle and increase the risk for a multitude of
                        water- and climate-induced hazards.
                        Within the middle mountain region, the project
                        area covers two major rivers, i.e., Marin and
                        Kyan in the midwestern part of Sindhuli

                        District, within the Churia belt of Nepal. The
                        watershed is highly vulnerable to climate
                        change, with higher exposure to multiple
                        hazards such as landslides, floods, and
                        droughts and higher sensitivity to indigenous
                        and local people in terms of livelihood depends
                        on subsistence agriculture. To address this
                        situations, The Managing Watersheds for
                        Enhanced Resilience of Communities to
                        Climate Change in Nepal (MaWRiN) Project
                        considers watershed approach to ensure the
                        longer-term resilience of local and indigenous
                        communities against these vulnerabilities and
                        hardships. Funded by the Global Environment
                        Facility (GEF), the project is implemented
                        through an agreement between the World
                        Wildlife Fund (WWF) (WWF GEF Agency)
                        and the Ministry of Forests and Environment
                        (Project Executing Agency), Government of
                        Nepal, and the Ministry of Forests and
                        Environment, Bagmati Province (Project
                        Executing Partner).' !!}
                    </div>
                </div>
            </div>
        </section>

        <!-- Components Section -->
        <section class="section" id="about">
            <div class="container">
                <!-- Project Components -->
                <div>
                    <h5 class="section-title" style="text-align: center;">{{ $section2->title ?? 'Components' }}</h5>
                    <div class="section-subtitle">
                        {!! $section2->description ?? '' !!}
                    </div>
                    <!-- Key Components Section -->
                    <div class="component-image-grid">
                        @if($components->count() > 0)
                        @foreach ($components as $k => $item)
                        @php
                        $i = $k + 1;
                        @endphp
                        <a href="{{ route('component.single', 'component-' . $i) }}" class="component-item fade-in">
                            <img src="{{ get_image('uploads/components/' . $item->featured_image) }}" alt="Component 1"
                                class="component-img">
                            <div class="component-title">{{ $item->title }}</div>
                        </a>
                        @endforeach
                        @else
                        <!-- Component 1 -->
                        <a href="{{ route('component.single', 'component-1') }}" class="component-item fade-in">
                            <img src="{{ asset('frontend/theme/img/1.jpg') }}" alt="Component 1" class="component-img">
                            <div class="component-title">Enabling Environment for Mainstreaming Climate Change</div>
                        </a>

                        <!-- Component 2 -->
                        <a href="{{ route('component.single', 'component-2') }}" class="component-item fade-in">
                            <img src="{{ asset('frontend/theme/img/2.jpg') }}" alt="Component 2" class="component-img">
                            <div class="component-title">Enhanced Resilience of Communities to Climate Change</div>
                        </a>

                        <!-- Component 3 -->
                        <a href="{{ route('component.single', 'component-3') }}" class="component-item fade-in">
                            <img src="{{ asset('frontend/theme/img/3.jpg') }}" alt="Component 3" class="component-img">
                            <div class="component-title">Monitoring, Evaluation and Knowledge Management</div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Area Section -->
        <section class="section" style="background: var(--bg-light);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $section3->title ?? 'Project Area' }}</h2>
                    <div class="section-subtitle">
                        {!! $section3->description ?? 'Located in the midwestern part of Sindhuli District, within the
                        Churia belt of Nepal' !!}
                    </div>
                </div>

                <div class="map-slider" id="mapSlider">
                    @if ($project_areas->count() > 0)
                    @foreach ($project_areas as $k => $item)
                    <div class="map-slide {{ $k == 0 ? 'active' : '' }}">
                        <img src="{{ get_image('uploads/media/' . $item->filename) }}" alt="Map 1"
                            style="width: 100%; height: auto; border-radius: 10px;">
                    </div>
                    @endforeach
                    @else
                    <div class="map-slide active">
                        <img src="{{ asset('frontend/theme/img/MaWRiN_Landuse.png') }}" alt="Map 1"
                            style="width: 100%; height: auto; border-radius: 10px;">
                    </div>
                    <div class="map-slide">
                        <img src="{{ asset('frontend/theme/img/MaWRiN_River System') }}.png" alt="Map 2"
                            style="width: 100%; height: auto; border-radius: 10px;">
                    </div>
                    @endif
                </div>

                <!-- Navigation dots -->
                <div class="map-navigation" id="mapNavigation">
                    @if ($project_areas->count() > 0)
                    @foreach ($project_areas as $k => $item)
                    <div class="map-dot {{ $k == 0 ? 'active' : '' }}" data-slide="{{ $k }}"></div>
                    @endforeach
                    @else
                    <div class="map-dot active" data-slide="0"></div>
                    <div class="map-dot" data-slide="1"></div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Knowledge Products Section -->
        <!-- <section class="section" id="reports">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-title">Knowledge Products</h2>
                        <p class="section-subtitle">
                            Access our latest reports, publications, and research findings
                        </p>
                    </div>
                    
                    <div class="knowledge-grid">
                        <div class="knowledge-card fade-in">
                            <div class="knowledge-header">
                                <i class="fas fa-file-pdf" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h3>Project Reports</h3>
                            </div>
                            <div class="knowledge-body">
                                <p>Comprehensive project reports including progress updates, impact assessments, and technical documentation.</p>
                                <a href="#" class="download-btn">
                                    <i class="fas fa-download"></i>
                                    Download Reports
                                </a>
                            </div>
                        </div>
                        
                        <div class="knowledge-card fade-in">
                            <div class="knowledge-header">
                                <i class="fas fa-book" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h3>Publications</h3>
                            </div>
                            <div class="knowledge-body">
                                <p>Research publications, policy briefs, and technical papers on climate adaptation and watershed management.</p>
                                <a href="#" class="download-btn">
                                    <i class="fas fa-download"></i>
                                    View Publications
                                </a>
                            </div>
                        </div>
                        
                        <div class="knowledge-card fade-in">
                            <div class="knowledge-header">
                                <i class="fas fa-chart-bar" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h3>Data & Analytics</h3>
                            </div>
                            <div class="knowledge-body">
                                <p>Climate data, vulnerability assessments, and monitoring datasets from the project area.</p>
                                <a href="#" class="download-btn">
                                    <i class="fas fa-download"></i>
                                    Access Data
                                </a>
                            </div>
                        </div>
                        
                        <div class="knowledge-card fade-in">
                            <div class="knowledge-header">
                                <i class="fas fa-lightbulb" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h3>Case Studies</h3>
                            </div>
                            <div class="knowledge-body">
                                <p>Real-world examples of successful climate adaptation interventions and community-based solutions.</p>
                                <a href="#" class="download-btn">
                                    <i class="fas fa-download"></i>
                                    Read Cases
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

        <!-- Gallery Section -->
        <section class="section" id="gallery">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $section4->title ?? 'Photo Gallery' }}</h2>
                    <div class="section-subtitle">
                        {!! $section4->description ?? 'Visual documentation of our project activities and community
                        engagement' !!}
                    </div>
                </div>

                @if ($gallery_images->count() > 0)
                <div class="gallery-grid">
                    @foreach ($gallery_images as $item)
                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ get_image('uploads/media/' . $item->filename) }}" alt="">
                            <span>{{ $item->name }}</span>
                        </div>
                    </div>
                    @endforeach

                    <a href="{{ url('gallery') }}" class="gallery-item fade-in" style="text-decoration: none;">
                        <div class="gallery-placeholder"
                            style="background-color: var(--accent-color); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem; font-weight: bold;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="white" d="M18 8a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M11.943 1.25h.114c2.309 0 4.118 0 5.53.19c1.444.194 2.584.6 3.479 1.494c.895.895 1.3 2.035 1.494 3.48c.19 1.411.19 3.22.19 5.529v.088c0 1.909 0 3.471-.104 4.743c-.104 1.28-.317 2.347-.795 3.235q-.314.586-.785 1.057c-.895.895-2.035 1.3-3.48 1.494c-1.411.19-3.22.19-5.529.19h-.114c-2.309 0-4.118 0-5.53-.19c-1.444-.194-2.584-.6-3.479-1.494c-.793-.793-1.203-1.78-1.42-3.006c-.215-1.203-.254-2.7-.262-4.558Q1.25 12.792 1.25 12v-.058c0-2.309 0-4.118.19-5.53c.194-1.444.6-2.584 1.494-3.479c.895-.895 2.035-1.3 3.48-1.494c1.411-.19 3.22-.19 5.529-.19m-5.33 1.676c-1.278.172-2.049.5-2.618 1.069c-.57.57-.897 1.34-1.069 2.619c-.174 1.3-.176 3.008-.176 5.386v.844l1.001-.876a2.3 2.3 0 0 1 3.141.104l4.29 4.29a2 2 0 0 0 2.564.222l.298-.21a3 3 0 0 1 3.732.225l2.83 2.547c.286-.598.455-1.384.545-2.493c.098-1.205.099-2.707.099-4.653c0-2.378-.002-4.086-.176-5.386c-.172-1.279-.5-2.05-1.069-2.62c-.57-.569-1.34-.896-2.619-1.068c-1.3-.174-3.008-.176-5.386-.176s-4.086.002-5.386.176"
                                    clip-rule="evenodd" />
                            </svg>
                            View More Photos
                        </div>
                    </a>
                </div>

                @else
                <div class="gallery-grid">
                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/1.jpg') }}" alt="">
                            <span>Community Workshops</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/2.jpg') }}" alt="">
                            <span>Watershed Restoration</span>

                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/3.jpg') }}" alt="">
                            <span>Water Management</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/4.jpg') }}" alt="">
                            <span>Training Sessions</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/5.jpg') }}" alt="">
                            <span>Forest Conservation</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/6.jpg') }}" alt="">
                            <span>Stakeholder Meetings</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/1.jpg') }}" alt="">
                            <span>Community Workshops</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/2.jpg') }}" alt="">
                            <span>Watershed Restoration</span>

                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/3.jpg') }}" alt="">
                            <span>Water Management</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/4.jpg') }}" alt="">
                            <span>Training Sessions</span>
                        </div>
                    </div>

                    <div class="gallery-item fade-in">
                        <div class="gallery-placeholder">
                            <img src="{{ asset('frontend/theme/img/5.jpg') }}" alt="">
                            <span>Forest Conservation</span>
                        </div>
                    </div>

                    <a href="{{ url('gallery') }}" class="gallery-item fade-in" style="text-decoration: none;">
                        <div class="gallery-placeholder"
                            style="background-color: var(--accent-color); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem; font-weight: bold;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="white" d="M18 8a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M11.943 1.25h.114c2.309 0 4.118 0 5.53.19c1.444.194 2.584.6 3.479 1.494c.895.895 1.3 2.035 1.494 3.48c.19 1.411.19 3.22.19 5.529v.088c0 1.909 0 3.471-.104 4.743c-.104 1.28-.317 2.347-.795 3.235q-.314.586-.785 1.057c-.895.895-2.035 1.3-3.48 1.494c-1.411.19-3.22.19-5.529.19h-.114c-2.309 0-4.118 0-5.53-.19c-1.444-.194-2.584-.6-3.479-1.494c-.793-.793-1.203-1.78-1.42-3.006c-.215-1.203-.254-2.7-.262-4.558Q1.25 12.792 1.25 12v-.058c0-2.309 0-4.118.19-5.53c.194-1.444.6-2.584 1.494-3.479c.895-.895 2.035-1.3 3.48-1.494c1.411-.19 3.22-.19 5.529-.19m-5.33 1.676c-1.278.172-2.049.5-2.618 1.069c-.57.57-.897 1.34-1.069 2.619c-.174 1.3-.176 3.008-.176 5.386v.844l1.001-.876a2.3 2.3 0 0 1 3.141.104l4.29 4.29a2 2 0 0 0 2.564.222l.298-.21a3 3 0 0 1 3.732.225l2.83 2.547c.286-.598.455-1.384.545-2.493c.098-1.205.099-2.707.099-4.653c0-2.378-.002-4.086-.176-5.386c-.172-1.279-.5-2.05-1.069-2.62c-.57-.569-1.34-.896-2.619-1.068c-1.3-.174-3.008-.176-5.386-.176s-4.086.002-5.386.176"
                                    clip-rule="evenodd" />
                            </svg>
                            View More Photos
                        </div>
                    </a>
                </div>
                @endif

            </div>
        </section>
        <!-- Events and Notices Section
            <section class="section" id="events" style="background: var(--bg-light);">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-title">Events & Notices</h2>
                        <p class="section-subtitle">
                            Stay updated with upcoming events and important announcements
                        </p>
                    </div>
                    
                    <div class="knowledge-grid">
                        <div class="knowledge-card fade-in">
                            <div class="knowledge-header">
                                <i class="fas fa-calendar-alt" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h3>Upcoming Events</h3>
                            </div>
                            <div class="knowledge-body">
                                <div style="border-left: 3px solid var(--accent-color); padding-left: 1rem; margin-bottom: 1rem;">
                                    <h4 style="color: var(--primary-color);">Community Consultation Workshop</h4>
                                    <p><i class="fas fa-calendar"></i> June 15, 2025</p>
                                    <p><i class="fas fa-map-marker-alt"></i> Sindhuli District</p>
                                </div>
                                <div style="border-left: 3px solid var(--accent-color); padding-left: 1rem;">
                                    <h4 style="color: var(--primary-color);">Stakeholder Meeting</h4>
                                    <p><i class="fas fa-calendar"></i> June 30, 2025</p>
                                    <p><i class="fas fa-map-marker-alt"></i> Kathmandu</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="knowledge-card fade-in">
                            <div class="knowledge-header">
                                <i class="fas fa-bullhorn" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h3>Latest Notices</h3>
                            </div>
                            <div class="knowledge-body">
                                <div style="border-left: 3px solid var(--accent-color); padding-left: 1rem; margin-bottom: 1rem;">
                                    <h4 style="color: var(--primary-color);">Project Progress Update</h4>
                                    <p><small>May 20, 2025</small></p>
                                    <p>Quarterly progress report now available for download.</p>
                                </div>
                                <div style="border-left: 3px solid var(--accent-color); padding-left: 1rem;">
                                    <h4 style="color: var(--primary-color);">New Publication Released</h4>
                                    <p><small>May 15, 2025</small></p>
                                    <p>Climate vulnerability assessment report published.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

        <!-- Contact Section -->
        <!-- <section class="section" id="contact" style="background: var(--bg-light);">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-title">Contact Us</h2>
                        <p class="section-subtitle">
                            Get in touch with our team for inquiries or collaboration opportunities
                        </p>
                    </div>
                    
                    <div class="contact-grid">
                        <div class="contact-info">
                            <h3 style="margin-bottom: 2rem; color: var(--white);">Get In Touch</h3>
                            
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Office Address</h4>
                                    <p>WWF Nepal<br>
                                    PO Box 7660<br>
                                    Kathmandu, Nepal</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h4>Phone</h4>
                                    <p>+977-1-4434820<br>
                                    +977-1-4434821</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p>info.mawrin@wwfnepal.org<br>
                                    pm.mawrin@wwfnepal.org</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h4>Office Hours</h4>
                                    <p>Sunday - Friday: 10:00 AM - 5:00 PM<br>
                                    Saturday: Closed</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-form">
                            <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);">Send Message</h3>
                            <form id="contactForm">
                                <div class="form-group">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Organization</label>
                                    <input type="text" class="form-input">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Subject *</label>
                                    <input type="text" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Message *</label>
                                    <textarea class="form-textarea" required></textarea>
                                </div>
                                
                                <button type="submit" class="submit-btn">
                                    <i class="fas fa-paper-plane"></i>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section> -->

        <!-- Report Grievance Section -->
        <section class="section" id="grievance"
            style="background: var(--gradient); color: var(--white); padding: 1.5rem 0;">
            <div class="container" style="text-align: center;">
                <h2 class="section-title" style="color: var(--white);">{{ $section5->title ?? 'Grievance Redress' }}</h2>
                <div style="max-width: 700px; margin: 0.5rem auto; font-size: 1.1rem; opacity: 0.95;">
                    {!! $section5->description ?? 'If you have any concerns, complaints, or feedback regarding the
                    MaWRiN Project, we encourage you to
                    report them through our grievance mechanism.' !!}
                </div>
                @if ($section5?->linkTo)
                <div style="display: flex; justify-content: center; align-items: center; margin-top: 1rem;">
                    <a href="{{ url($section5?->page?->slug ?? 'grievance') }}" class="cta-button"
                        style="background: var(--white); color: var(--primary-color); margin-top: 0.5 rem; display: flex; width: fit-content; align-items: center; justify-content: center;">
                        <svg style="margin-right:0.25rem;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 32 32">
                            <g fill="currentColor">
                                <path
                                    d="M14.534 9.266h.007c.228 0 .446-.09.599-.247L19.83 4.2a.713.713 0 0 0-.058-1.06a.85.85 0 0 0-1.14.054L14.55 7.387l-1.174-1.246a.85.85 0 0 0-1.14-.07a.714.714 0 0 0-.075 1.058l1.771 1.881a.84.84 0 0 0 .602.256m10.269 16.611c0 .78.68 1.413 1.521 1.413s1.522-.633 1.522-1.413v-7.915c0-.78-.681-1.413-1.522-1.413c-.84 0-1.522.632-1.522 1.413z" />
                                <path
                                    d="M11.962 1.5c-.933 0-1.847.647-1.847 1.625V5H4.288C2.543 5 1 6.33 1 8.125V29a2 2 0 0 0 2 2h26a2 2 0 0 0 2-2V8.125C31 6.33 29.457 5 27.712 5h-5.759V3.125c0-.978-.914-1.625-1.846-1.625zm-.847 1.625c0-.265.291-.625.846-.625h8.146c.556 0 .846.36.846.625V10.5h-9.838zM21.953 7h5.759C28.494 7 29 7.572 29 8.125v5.846H3V8.125C3 7.572 3.506 7 4.288 7h5.827v2.582c-.526.167-.906.63-.906 1.176c0 .686.6 1.242 1.338 1.242h10.906c.74 0 1.338-.556 1.338-1.242c0-.521-.347-.968-.838-1.152zM3 16h26v13H3z" />
                            </g>
                        </svg>
                        {{ get_phrase("Report Grievance") }}
                    </a>
                </div>
                @endif

            </div>
        </section>
    </main>

    <x-modals.image-modal />

    @push('scripts')
    <script>
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        const closeModal = document.querySelector(".modal-close");
  
        // Open modal on image click
        document.querySelectorAll(".gallery-item img").forEach(img => {
        img.addEventListener("click", function () {
            if (this.src) {
            modal.style.display = "block";
            modalImg.src = this.src;
            }
        });
        });
  
        // Close modal on X click
        closeModal.addEventListener("click", () => {
        modal.style.display = "none";
        modalImg.src = "";
        });
  
        // Close modal on outside click
        window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
            modalImg.src = "";
        }
        });
    </script>
    @endpush

</x-layouts.frontend>