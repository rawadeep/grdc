<x-layouts.frontend>
    <main>
        @if ($page)
        <section class="section">
            <div class="container">
                <div class="component-overview">
                    <h2>{{ get_phrase('Component') }} {{ get_phrase('3') }}: {{ $page->title }}</h2>
                    {!! $page->content !!}
                </div>

                <!-- Outcome and Outputs Table -->
                <div class="section">
                    <h2 class="section-title">{{ get_phrase('Project Framework') }} - {{ get_phrase('Component') }} {{
                        get_phrase('3') }}</h2>
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
                                    <strong>{{ get_phrase('Component') }} {{ get_phrase('3') }}:</strong>
                                    {{ $page->project_framework_description }}
                                </td>
                                <td style="padding: 1rem;">
                                    @foreach ($page->outcomes as $k => $item)
                                    @if( $item )
                                    <strong>{{ get_phrase('Outcome') }} {{ get_phrase('3') }}.{{ get_phrase($k+1)
                                        }}:</strong>
                                    {{ $item }}<br /><br />
                                    @endif
                                    @endforeach
                                </td>
                                <td style="padding: 1rem;">
                                    @foreach ($page->outputs as $k => $item)
                                    @if( $item )
                                    <strong>{{ get_phrase('Output') }} {{ get_phrase('3') }}.{{ get_phrase('1') }}.{{
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
                    <h2>Component 3: Monitoring, Evaluation, and Knowledge Management</h2>
                    <p><strong>Component 3:</strong> Monitoring, evaluation and knowledge management, through tracking
                        of project progress on a regular basis, garnering and analysis of lessons and good practices,
                        and development and dissemination of knowledge that reinforces project results from components 1
                        and 2, providing sound basis for their replication, adaptation and sustainability.</p>

                    <p><strong>With GEF/LDCF financing of USD 294,131 and co-financing of USD 804,628, the monitoring,
                            evaluation and knowledge management component of the project will be key to ensure that the
                            project is effectively implemented and progresses in line with expected results and managed
                            adaptively in response to challenges and lessons experienced during project
                            implementation.</strong></p>

                    <p>Knowledge management will be pursued through case studies to analyze and highlight concepts,
                        approaches and issues that the project addressed, and the lessons and best practices that
                        emerged from project implementation. The project will support the development of information and
                        knowledge products related to CCA including information on the different impacts of climate
                        change across gender, age, and social groups. The project will consider communities as
                        generators of knowledge and promote peer-to-peer and lateral knowledge-sharing.</p>

                    <p>In this respect, it will support the assessment, documentation and dissemination of Indigenous
                        knowledge for CCA, and promote its integration in adaptation solutions for agriculture,
                        livestock management, water management, and community/ leasehold forest management (linkage with
                        project component 2). Media and communication events will be organized to enhance the visibility
                        of project activities and achievements and create wider awareness of watershed management
                        approach to climate change adaptation and the innovations on the ground.</p>

                    <p>Under this component, the project will have a monitoring and evaluation system in place to keep
                        track of project progress against project results including GESI indicators, ESS indicators,
                        identify constraints and challenges to project progress, and provide information for adaptive
                        management.</p>

                    <p>As required for all full-size GEF projects, a mid-term evaluation of the project will be
                        conducted after two years of project implementation and a terminal project evaluation will be
                        done towards the end of the project. Annual and bi-annual project reviews will be undertaken as
                        a part of the project management, and periodic progress reports will be produced to inform
                        project stakeholders and provide documentation for planning and evaluation purposes.</p>
                </div>

                <!-- Outcome and Outputs Table -->
                <div class="section">
                    <h2 class="section-title">Project Framework - Component 3</h2>
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
                                <td style="padding: 1rem;"><strong>Component 3:</strong> Monitoring, evaluation and
                                    knowledge management, through tracking of project progress on a regular basis,
                                    garnering and analysis of lessons and good practices, and development and
                                    dissemination of knowledge that reinforces project results from components 1 and 2,
                                    providing sound basis for their replication, adaptation and sustainability.</td>
                                <td style="padding: 1rem;">
                                    <strong>Outcome 3.1:</strong> Project monitoring, evaluation, and learning to enable
                                    adaptive management, replication and sustainability.
                                </td>
                                <td style="padding: 1rem;">
                                    <strong>Output 3.1.1:</strong> Knowledge products are developed and disseminated to
                                    enable upscaling of the project activities.<br><br>
                                    <strong>Output 3.1.2:</strong> Project progress tracked effectively through project
                                    Monitoring and Evaluation (M&E).
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