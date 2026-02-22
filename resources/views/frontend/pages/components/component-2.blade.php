<x-layouts.frontend>
    <main>
        @if ($page)
        <section class="section">
            <div class="container">
                <div class="component-overview">
                    <h2>{{ get_phrase('Component') }} {{ get_phrase('2') }} {{ $page->title }}</h2>
                    {!! $page->content !!}
                </div>

                <!-- Outcome and Outputs Table -->
                <div class="section">
                    <h2 class="section-title">{{ get_phrase('Project Framework') }} - {{ get_phrase('Component') }} {{
                        get_phrase('1') }}</h2>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                        <thead>
                            <tr style="background-color: var(--primary-color); color: white;">
                                <th style="padding: 1rem; text-align: left;">{{ get_phrase('Project Components') }} / {{
                                    get_phrase('Programs') }}</th>
                                <th style="padding: 1rem; text-align: left;">{{ get_phrase('Project Outcomes') }}</th>
                                <th style="padding: 1rem; text-align: left;">{{ get_phrase('Project Outputs') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 1rem;">
                                    <strong>{{ get_phrase('Component') }} {{ get_phrase('2') }}</strong>
                                    {{ $page->project_framework_description }}
                                </td>
                                <td style="padding: 1rem;">
                                    @foreach ($page->outcomes as $k => $item)
                                    @if( $item )
                                    <strong>{{ get_phrase('Outcome') }} {{ get_phrase('2') }}.{{ get_phrase($k+1)
                                        }}:</strong>
                                    {{ $item }}<br /><br />
                                    @endif
                                    @endforeach
                                </td>
                                <td style="padding: 1rem;">
                                    @foreach ($page->outputs as $k => $item)
                                    @if( $item )
                                    <strong>{{ get_phrase('Output') }} {{ get_phrase('2') }}.{{ get_phrase('1') }}.{{
                                        get_phrase($k+1) }}:</strong>
                                    {{ $item }}<br /><br />
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @else
        <!-- Component Details Section -->
        <section class="section">
            <div class="container">
                <div class="component-overview">
                    <h2>Component 2: Enhanced Resilience of Communities to Climate Change</h2>
                    <p><strong>Component 2:</strong> Enhanced Resilience of Local Communities to Climate Change through
                        a) community-based natural resource management such as community identification of adaptation
                        interventions, support and demonstration of sustainable and climate-resilient agriculture and
                        livestock practices, improved water management, strengthened management of community and
                        leasehold forests, and b) Nature-based Solutions that reduce climate impacts and risks.</p>

                    <p><strong>With GEF/LDCF financing of USD 7,945,559 and co-financing of USD 23,602,407, this will be
                            the largest project component and will focus on field investments for technology transfer of
                            climate-adaptive solutions in agriculture, livestock management and water
                            management.</strong></p>

                    <p>It will involve community training, farmer-to-farmer learning, extension skills training for
                        government staff and private service providers in agriculture and livestock sectors, and field
                        demonstrations, integrating Indigenous Knowledge and practices wherever appropriate (linkage to
                        project component 3, wherein the project will support assessment and documentation of Indigenous
                        Knowledge related to climate-adaptive practices). Basic equipment and material support will also
                        be provided to the local communities for implementation of climate-adaptive technologies and
                        practices.</p>

                    <p>These technologies and practices will help to transform and reorient the local farming system to
                        a more resilient system that ensures food and livelihood security under a changing climate. To
                        economically incentivize farmers to adopt technologies and practices that enhance the climate
                        resilience of their livelihoods, the project will promote household-level, small-scale
                        commercialization of crops and livestock produces emanating from climate-adaptive technologies
                        and practices. This will be pursued through partnerships between the farmers and private sector
                        based on a cooperative approach that protects the interest of the farmers whilst also attracting
                        private sector to get involved.</p>

                    <p>The project will further support community forest users and leasehold forest groups with
                        training, awareness building, technical backstopping and equipment/ materials, contributing to
                        improved livelihoods whilst also addressing forest degradation, which exacerbate climate hazards
                        and disasters such as landslides, soil erosion, floods and forest fires.</p>

                    <p>It will design and implement NbS interventions to arrest land degradation and mitigate climate
                        disaster risks in areas/sites that are most vulnerable. In order to maintain focus and
                        demonstrate tangible results, six critical catchment areas – Kyan Khola, Phulbari khola, Ghagar
                        khola Dhungajor, Jalkeni Sakhauri, and Simale – have been identified for implementation of NbS
                        interventions and community-based natural resource management taking into account
                        upstream-downstream linkages. The approach will be to first introduce climate smart NbS
                        interventions in the upstream problem areas and then move to midstream and downstream areas.</p>
                </div>

                <!-- Outcome and Outputs Table -->
                <div class="section">
                    <h2 class="section-title">Project Framework - Component 2</h2>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                        <thead>
                            <tr style="background-color: var(--primary-color); color: white;">
                                <th style="padding: 1rem; text-align: left;">Project Components / Programs</th>
                                <th style="padding: 1rem; text-align: left;">Project Outcomes</th>
                                <th style="padding: 1rem; text-align: left;">Project Outputs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 1rem;"><strong>Component 2:</strong> Enhanced Resilience of Local
                                    Communities to Climate Change through a) community-based natural resource management
                                    such as community identification of adaptation interventions, support and
                                    demonstration of sustainable and climate-resilient agriculture and livestock
                                    practices, improved water management, strengthened management of community and
                                    leasehold forests, and b) Nature-based Solutions that reduce climate impacts and
                                    risks.</td>
                                <td style="padding: 1rem;">
                                    <strong>Outcome 2.1:</strong> Increased adaptive capacity of vulnerable households
                                    in the Marin Watershed to climate-induced disasters such as landslides, floods,
                                    droughts, and forest fire.<br><br>
                                    <strong>Outcome 2.2:</strong> Nature-based Solutions (NbS) reduce climate-induced
                                    vulnerabilities of community livelihood resources and assets.
                                </td>
                                <td style="padding: 1rem;">
                                    <strong>Output 2.1.1:</strong> Climate-adaptive technologies and practices for
                                    agriculture, livestock management and water management introduced and
                                    demonstrated.<br><br>
                                    <strong>Output 2.2.1:</strong> Management of community and leasehold forests
                                    strengthened, and vulnerable catchment areas rehabilitated and protected for reduced
                                    vulnerability to climate-induced disaster risks such as landslides, sedimentation,
                                    flooding and forest fires.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endif
    </main>
</x-layouts.frontend>