<x-layouts.frontend>
    <main>
        <!-- Case Studies Section -->
        <section class="section" id="case-studies">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Featured Case Studies</h2>
                    <p class="section-subtitle">
                        {{ $page->description ?? 'Explore our collection of case studies that highlight innovative
                        solutions and best practices in climate adaptation and resilience building across Nepal.' }}
                    </p>
                </div>

                <!-- Knowledge Grid -->
                <div class="knowledge-grid">

                    @if( $rows->count() > 0 )
                    @foreach($rows as $row)
                    <div class="knowledge-card fade-in"
                        onclick="openDynamicModal('caseStudyModal', '{{ $row->slug }}')">
                        <div class="knowledge-header">
                            <i class="{{ $row->icon }}" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>{{ $row->title }}</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>{{ $row->description }}</p>
                            <div class="case-count">
                                <small>{{ $row->case_studies()->count() }} Case Studies Available</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <!-- Case Study Card 1 -->
                    <div class="knowledge-card fade-in" onclick="openModal('forestManagement')">
                        <div class="knowledge-header">
                            <i class="fas fa-lightbulb" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Community-Based Forest Management</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>How community forest user groups are managing forest resources sustainably while
                                enhancing resilience to landslides and forest fires.</p>
                            <div class="case-count">
                                <small>3 Case Studies Available</small>
                            </div>
                        </div>
                    </div>

                    <!-- Case Study Card 2 -->
                    <div class="knowledge-card fade-in" onclick="openModal('agriculture')">
                        <div class="knowledge-header">
                            <i class="fas fa-seedling" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Climate-Resilient Agriculture</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>Adoption of drought-resistant crops and improved water management techniques in
                                vulnerable farming households.</p>
                            <div class="case-count">
                                <small>4 Case Studies Available</small>
                            </div>
                        </div>
                    </div>

                    <!-- Case Study Card 3 -->
                    <div class="knowledge-card fade-in" onclick="openModal('rainwater')">
                        <div class="knowledge-header">
                            <i class="fas fa-water" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Rainwater Harvesting Solutions</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>Small-scale rainwater harvesting systems introduced in upstream catchments to improve
                                dry-season water availability.</p>
                            <div class="case-count">
                                <small>2 Case Studies Available</small>
                            </div>
                        </div>
                    </div>

                    <!-- Case Study Card 4 -->
                    <div class="knowledge-card fade-in" onclick="openModal('slopeStabilization')">
                        <div class="knowledge-header">
                            <i class="fas fa-mountain" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Nature-Based Slope Stabilization</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>Using vegetation and bioengineering to stabilize slopes and reduce landslide risks in
                                degraded catchment areas.</p>
                            <div class="case-count">
                                <small>3 Case Studies Available</small>
                            </div>
                        </div>
                    </div>

                    <!-- Case Study Card 5 -->
                    <div class="knowledge-card fade-in" onclick="openModal('youthEngagement')">
                        <div class="knowledge-header">
                            <i class="fas fa-users" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Youth Engagement in Adaptation</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>Empowering youth through training and leadership opportunities in climate risk mapping
                                and disaster preparedness.</p>
                            <div class="case-count">
                                <small>2 Case Studies Available</small>
                            </div>
                        </div>
                    </div>

                    <!-- Case Study Card 6 -->
                    <div class="knowledge-card fade-in" onclick="openModal('indigenousKnowledge')">
                        <div class="knowledge-header">
                            <i class="fas fa-book" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Integrating Indigenous Knowledge</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>Promoting traditional practices for soil conservation, water management, and biodiversity
                                conservation alongside modern techniques.</p>
                            <div class="case-count">
                                <small>3 Case Studies Available</small>
                            </div>
                        </div>
                    </div>
                    @endif


                </div>
            </div>
        </section>

        <!-- Modal Overlay -->
        <div id="modalOverlay" class="modal-overlay" onclick="closeModal()"></div>

        <div id="caseStudyModal" class="modal">
            <div id="caseStudyModalContent" class="modal-content">

            </div>
        </div>

        <!-- Forest Management Modal -->
        <div id="forestManagement" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-lightbulb"></i> Community-Based Forest Management</h3>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="case-study-list">
                        <div class="case-study-item" onclick="openCaseStudy('forest-management-khumbu')">
                            <h4>Forest Management in Khumbu Valley</h4>
                            <p>Community-led conservation efforts in the Everest region</p>
                            <small>Updated: March 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('fire-prevention-chitwan')">
                            <h4>Fire Prevention Strategies in Chitwan</h4>
                            <p>Collaborative approaches to wildfire management</p>
                            <small>Updated: February 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('reforestation-dolakha')">
                            <h4>Reforestation Initiative in Dolakha</h4>
                            <p>Community-driven reforestation after the 2015 earthquake</p>
                            <small>Updated: January 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agriculture Modal -->
        <div id="agriculture" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-seedling"></i> Climate-Resilient Agriculture</h3>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="case-study-list">
                        <div class="case-study-item" onclick="openCaseStudy('drought-resistant-crops-bardiya')">
                            <h4>Drought-Resistant Crops in Bardiya</h4>
                            <p>Adoption of climate-adapted varieties in western Nepal</p>
                            <small>Updated: March 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('water-management-kaski')">
                            <h4>Water Management in Kaski District</h4>
                            <p>Efficient irrigation systems for smallholder farmers</p>
                            <small>Updated: February 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('organic-farming-lalitpur')">
                            <h4>Organic Farming Transition in Lalitpur</h4>
                            <p>Supporting farmers in sustainable agriculture practices</p>
                            <small>Updated: January 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('climate-smart-techniques-dang')">
                            <h4>Climate-Smart Techniques in Dang</h4>
                            <p>Integrated approaches to climate adaptation in agriculture</p>
                            <small>Updated: December 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rainwater Modal -->
        <div id="rainwater" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-water"></i> Rainwater Harvesting Solutions</h3>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="case-study-list">
                        <div class="case-study-item" onclick="openCaseStudy('rainwater-harvesting-mustang')">
                            <h4>Rainwater Harvesting in Mustang</h4>
                            <p>Traditional and modern techniques in water-scarce regions</p>
                            <small>Updated: March 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('community-tanks-sindhuli')">
                            <h4>Community Water Tanks in Sindhuli</h4>
                            <p>Collective rainwater storage solutions for rural communities</p>
                            <small>Updated: February 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slope Stabilization Modal -->
        <div id="slopeStabilization" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-mountain"></i> Nature-Based Slope Stabilization</h3>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="case-study-list">
                        <div class="case-study-item" onclick="openCaseStudy('bioengineering-lamjung')">
                            <h4>Bioengineering Solutions in Lamjung</h4>
                            <p>Using native vegetation for slope stabilization</p>
                            <small>Updated: March 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('landslide-mitigation-sindhupalchok')">
                            <h4>Landslide Mitigation in Sindhupalchok</h4>
                            <p>Post-earthquake slope management strategies</p>
                            <small>Updated: February 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('erosion-control-dhading')">
                            <h4>Erosion Control in Dhading</h4>
                            <p>Community-based approaches to soil conservation</p>
                            <small>Updated: January 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Youth Engagement Modal -->
        <div id="youthEngagement" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-users"></i> Youth Engagement in Adaptation</h3>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="case-study-list">
                        <div class="case-study-item" onclick="openCaseStudy('youth-climate-mapping-kathmandu')">
                            <h4>Youth Climate Mapping in Kathmandu</h4>
                            <p>Student-led climate risk assessment initiatives</p>
                            <small>Updated: March 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('disaster-preparedness-training-pokhara')">
                            <h4>Disaster Preparedness Training in Pokhara</h4>
                            <p>Empowering youth as community disaster response leaders</p>
                            <small>Updated: February 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Indigenous Knowledge Modal -->
        <div id="indigenousKnowledge" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-book"></i> Integrating Indigenous Knowledge</h3>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="case-study-list">
                        <div class="case-study-item" onclick="openCaseStudy('traditional-water-management-jumla')">
                            <h4>Traditional Water Management in Jumla</h4>
                            <p>Ancient irrigation systems adapted for modern challenges</p>
                            <small>Updated: March 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('indigenous-seed-conservation-rukum')">
                            <h4>Indigenous Seed Conservation in Rukum</h4>
                            <p>Preserving traditional crop varieties for climate resilience</p>
                            <small>Updated: February 2024</small>
                        </div>
                        <div class="case-study-item" onclick="openCaseStudy('traditional-forest-practices-dolpo')">
                            <h4>Traditional Forest Practices in Dolpo</h4>
                            <p>Integrating ancestral knowledge with modern conservation</p>
                            <small>Updated: January 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('styles')
    <style>
        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-header h3 {
            margin: 0;
            color: #1f2937;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-header h3 i {
            margin-right: 8px;
            color: #059669;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #6b7280;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            color: #374151;
        }

        .modal-body {
            padding: 0 24px 24px;
        }

        .case-study-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .case-study-item {
            padding: 16px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .case-study-item:hover {
            border-color: #059669;
            background-color: #f0fdf4;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .case-study-item h4 {
            margin: 0 0 8px 0;
            color: #1f2937;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .case-study-item p {
            margin: 0 0 8px 0;
            color: #6b7280;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .case-study-item small {
            color: #9ca3af;
            font-size: 0.8rem;
        }

        /* Enhanced Card Styles */
        .knowledge-card {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .knowledge-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .case-count {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
        }

        .case-count small {
            color: #059669;
            font-weight: 500;
        }

        /* Animation for modal */
        .modal.show {
            display: block;
            animation: modalFadeIn 0.3s ease;
        }

        .modal-overlay.show {
            display: block;
            animation: overlayFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        @keyframes overlayFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal {
                width: 95%;
                max-height: 85vh;
            }

            .modal-header {
                padding: 16px 20px;
            }

            .modal-body {
                padding: 0 20px 20px;
            }
        }
    </style>
    @endpush
    @push('scripts')
    <script>
        function openModal(modalId) {
            document.getElementById('modalOverlay').classList.add('show');
            document.getElementById(modalId).classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function openDynamicModal(modalId, caseStudySlug) {
            // Fetch case study content dynamically
            fetch(`/fetch/case-studies/${caseStudySlug}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('caseStudyModalContent').innerHTML = html;
                    document.getElementById('modalOverlay').classList.add('show');
                    document.getElementById('caseStudyModal').classList.add('show');
                    document.body.style.overflow = 'hidden';
                })
                .catch(error => {
                    console.error('Error fetching case study:', error);
                });
        }

        function closeModal() {
            document.getElementById('modalOverlay').classList.remove('show');
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
            document.body.style.overflow = 'auto';
        }

        function openCaseStudy(caseStudySlug) {
            // Redirect to individual case study page
            window.location.href = `/case-studies/${caseStudySlug}`;
        }

        // Close modal when clicking outside
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('modalOverlay').addEventListener('click', closeModal);
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    </script>
    @endpush

</x-layouts.frontend>