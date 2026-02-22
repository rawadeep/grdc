(() => {
    const { createApp } = Vue;

    const menu = [
        { label: 'About Us', path: '/about-us' },
        {
            label: 'Team',
            children: [
                { label: 'Governance Council', path: '/team/governance-council' },
                { label: 'Personnel', path: '/team/personnel' },
                { label: 'Expert/Consultants', path: '/team/experts-consultants' },
            ],
        },
        {
            label: 'Project',
            children: [
                { label: 'Ongoing', path: '/projects/ongoing' },
                { label: 'Completed', path: '/projects/completed' },
            ],
        },
        {
            label: 'Publication',
            children: [
                { label: 'Articles', path: '/publications/articles' },
                { label: 'Reports', path: '/publications/reports' },
                { label: 'Manuals & Guidelines', path: '/publications/manuals-guidelines' },
                { label: 'Photo Gallery', path: '/publications/photo-gallery' },
            ],
        },
        {
            label: 'Events/Career',
            children: [
                { label: 'Upcoming', path: '/events-career/upcoming' },
                { label: 'Completed', path: '/events-career/completed' },
                { label: 'Vacancy', path: '/events-career/vacancy' },
            ],
        },
        { label: 'Contact Us', path: '/contact-us' },
    ];

    const pages = {
        home: {
            title: 'Green Research & Development Center',
            subtitle: 'Driving sustainable, evidence-based, and community-centered development across climate, agriculture, livelihoods, and policy.',
            highlight: 'We bridge local realities with global standards through field research, impact projects, and practical knowledge products.',
            kpis: [
                { value: '10+', label: 'Years of Engagement' },
                { value: '55+', label: 'Research Works' },
                { value: '70+', label: 'Communities Reached' },
            ],
            sections: [
                {
                    title: 'Organization Snapshot',
                    lead: 'GRDC is a non-governmental organization (NGO) focused on applied research and resilient development solutions.',
                    type: 'cards',
                    items: [
                        {
                            title: 'Our Focus',
                            text: 'Environment, climate adaptation, inclusive growth, local governance, and knowledge dissemination.',
                        },
                        {
                            title: 'How We Work',
                            text: 'Participatory diagnostics, evidence generation, pilot implementation, and replication frameworks.',
                        },
                        {
                            title: 'Who We Work With',
                            text: 'Communities, local governments, academia, civil society networks, and development partners.',
                        },
                    ],
                },
                {
                    title: 'Explore Main Sections',
                    lead: 'Use the navigation to access all sections specified in the GRDC structure.',
                    type: 'cards',
                    items: [
                        { title: 'Team', text: 'Governance Council, Personnel, and Expert/Consultants.' },
                        { title: 'Project', text: 'Current interventions and completed initiatives.' },
                        { title: 'Publication', text: 'Articles, reports, manuals/guidelines, and gallery.' },
                    ],
                },
            ],
        },
        'about-us': {
            title: 'About GRDC',
            subtitle: 'GRDC supports climate-smart and socially inclusive development pathways through practical research and implementation support.',
            highlight: 'Our core mandate is to convert evidence into clear action frameworks for institutions and communities.',
            kpis: [
                { value: '3', label: 'Strategic Pillars' },
                { value: '14', label: 'District Footprint' },
                { value: '30+', label: 'Partner Institutions' },
            ],
            sections: [
                {
                    title: 'Mission, Vision, Values',
                    type: 'cards',
                    items: [
                        {
                            title: 'Mission',
                            text: 'Generate practical knowledge and build local capacity for resilient development decisions.',
                        },
                        {
                            title: 'Vision',
                            text: 'A just, climate-resilient, and research-informed society with strong local institutions.',
                        },
                        {
                            title: 'Values',
                            text: 'Integrity, inclusiveness, accountability, scientific rigor, and people-centered service.',
                        },
                    ],
                },
                {
                    title: 'Strategic Priorities',
                    type: 'list',
                    columns: [
                        {
                            title: 'Research & Innovation',
                            points: ['Action research in adaptation and livelihoods', 'Data-driven planning support', 'Policy briefs and decision notes'],
                        },
                        {
                            title: 'Capacity & Systems',
                            points: ['Training for local institutions', 'Community facilitation models', 'Monitoring and impact learning'],
                        },
                    ],
                },
            ],
        },
        'team/governance-council': {
            title: 'Governance Council',
            subtitle: 'The Governance Council sets strategic direction and ensures transparent institutional leadership.',
            highlight: 'The council provides policy oversight, accountability, and quality assurance for all GRDC programs.',
            kpis: [
                { value: '7', label: 'Council Members' },
                { value: '4', label: 'Quarterly Meetings' },
                { value: '100%', label: 'Annual Compliance Reviews' },
            ],
            sections: [
                {
                    title: 'Council Composition',
                    type: 'cards',
                    items: [
                        { title: 'Chairperson', text: 'Leads governance direction and board decisions.' },
                        { title: 'Vice Chairperson', text: 'Supports strategic oversight and continuity.' },
                        { title: 'Secretary', text: 'Ensures governance documentation and records.' },
                    ],
                },
                {
                    title: 'Key Functions',
                    type: 'list',
                    columns: [
                        {
                            title: 'Oversight',
                            points: ['Approve annual plans and budgets', 'Review policy and risk frameworks', 'Guide partnership strategy'],
                        },
                        {
                            title: 'Governance',
                            points: ['Monitor fiduciary integrity', 'Track compliance and safeguarding', 'Evaluate executive performance'],
                        },
                    ],
                },
            ],
        },
        'team/personnel': {
            title: 'Personnel',
            subtitle: 'GRDC personnel execute research, implementation, and communication functions across programs.',
            highlight: 'The team combines field experience, technical depth, and cross-sector coordination.',
            kpis: [
                { value: '24', label: 'Core Personnel' },
                { value: '8', label: 'Technical Units' },
                { value: '40%', label: 'Women in Leadership Roles' },
            ],
            sections: [
                {
                    title: 'Operational Units',
                    type: 'cards',
                    items: [
                        { title: 'Research Unit', text: 'Study design, data collection, analysis, and technical reporting.' },
                        { title: 'Program Unit', text: 'Project execution, local coordination, and field supervision.' },
                        { title: 'Knowledge Unit', text: 'Publications, media, outreach, and evidence communication.' },
                    ],
                },
            ],
        },
        'team/experts-consultants': {
            title: 'Expert/Consultants',
            subtitle: 'GRDC works with domain experts to strengthen technical quality and strategic relevance.',
            highlight: 'Consultants provide targeted support on advanced themes and independent evaluations.',
            kpis: [
                { value: '18+', label: 'Experts on Roster' },
                { value: '6', label: 'Specialized Domains' },
                { value: '12', label: 'Annual Assignments' },
            ],
            sections: [
                {
                    title: 'Expertise Areas',
                    type: 'list',
                    columns: [
                        {
                            title: 'Technical Domains',
                            points: ['Climate adaptation and DRR', 'Sustainable agriculture', 'Policy and governance'],
                        },
                        {
                            title: 'Support Functions',
                            points: ['External evaluations', 'Capacity-building modules', 'Monitoring systems design'],
                        },
                    ],
                },
            ],
        },
        'projects/ongoing': {
            title: 'Ongoing Projects',
            subtitle: 'Current GRDC programs emphasize resilience, inclusion, and measurable local outcomes.',
            highlight: 'Each project combines evidence generation, local engagement, and policy linkage.',
            kpis: [
                { value: '9', label: 'Active Projects' },
                { value: '21', label: 'Local Governments' },
                { value: '$1.4M', label: 'Annual Program Portfolio' },
            ],
            sections: [
                {
                    title: 'Current Portfolio',
                    type: 'timeline',
                    items: [
                        { year: '2025-2027', title: 'Climate Resilience for Mountain Communities', detail: 'Risk profiling, adaptation planning, and local implementation grants.' },
                        { year: '2024-2026', title: 'Agro-Ecology Action Program', detail: 'Soil restoration, market linkage pilots, and producer training.' },
                        { year: '2025-2026', title: 'Green Youth Innovation Labs', detail: 'Local innovation challenges for climate-smart enterprises.' },
                    ],
                },
            ],
        },
        'projects/completed': {
            title: 'Completed Projects',
            subtitle: 'Selected completed projects demonstrating GRDC implementation and knowledge outcomes.',
            highlight: 'Completed projects feed directly into current methodologies and policy recommendations.',
            kpis: [
                { value: '34', label: 'Projects Completed' },
                { value: '120+', label: 'Knowledge Outputs' },
                { value: '85%', label: 'Outcomes Sustained Post-Project' },
            ],
            sections: [
                {
                    title: 'Flagship Completed Initiatives',
                    type: 'cards',
                    items: [
                        { title: 'Local Adaptation Planning Support (2021-2024)', text: 'Built evidence-based adaptation plans in 12 local governments.' },
                        { title: 'Watershed-Livelihood Integration (2020-2023)', text: 'Combined watershed restoration with income pathways for vulnerable groups.' },
                        { title: 'Resilient Settlements Initiative (2019-2022)', text: 'Generated settlement risk atlases and preparedness protocols.' },
                    ],
                },
            ],
        },
        'publications/articles': {
            title: 'Publication: Articles',
            subtitle: 'Short-form expert articles translating evidence into accessible insights.',
            highlight: 'Articles support informed public and institutional dialogue on development priorities.',
            kpis: [
                { value: '60+', label: 'Published Articles' },
                { value: '4', label: 'Topical Series' },
                { value: 'Monthly', label: 'Release Cycle' },
            ],
            sections: [
                {
                    title: 'Recent Articles',
                    type: 'cards',
                    items: [
                        { title: 'Community-Led Adaptation in Practice', text: 'What works when local ownership drives adaptation planning.' },
                        { title: 'Risk Data for Local Decision-Making', text: 'How municipalities can use evidence for priority-setting.' },
                        { title: 'Youth-Led Green Enterprises', text: 'Lessons from incubation and market linkage support.' },
                    ],
                },
            ],
        },
        'publications/reports': {
            title: 'Publication: Reports',
            subtitle: 'In-depth analytical and program reports from GRDC initiatives.',
            highlight: 'Reports provide technical evidence for policy, programming, and replication.',
            kpis: [
                { value: '40+', label: 'Technical Reports' },
                { value: '12', label: 'Impact Reports' },
                { value: 'Open', label: 'Public Access Policy' },
            ],
            sections: [
                {
                    title: 'Report Library Highlights',
                    type: 'list',
                    columns: [
                        {
                            title: 'Technical Reports',
                            points: ['Climate risk assessments', 'Value-chain diagnostics', 'Institutional capacity scans'],
                        },
                        {
                            title: 'Program Reports',
                            points: ['Annual impact reports', 'Donor project updates', 'Learning synthesis notes'],
                        },
                    ],
                },
            ],
        },
        'publications/manuals-guidelines': {
            title: 'Publication: Manuals & Guidelines',
            subtitle: 'Operational manuals and field guidelines for practitioners, institutions, and partners.',
            highlight: 'Designed for direct use in planning, implementation, and monitoring.',
            kpis: [
                { value: '22', label: 'Manuals Published' },
                { value: '8', label: 'Practical Toolkits' },
                { value: '3', label: 'Language Versions' },
            ],
            sections: [
                {
                    title: 'Toolkit Categories',
                    type: 'cards',
                    items: [
                        { title: 'Planning Manuals', text: 'Step-by-step local development and adaptation planning methods.' },
                        { title: 'Field Guidelines', text: 'Implementation protocols and quality checklists.' },
                        { title: 'Monitoring Templates', text: 'Indicator frameworks, dashboards, and learning logs.' },
                    ],
                },
            ],
        },
        'publications/photo-gallery': {
            title: 'Publication: Photo Gallery',
            subtitle: 'Visual documentation of field programs, events, and collaboration moments.',
            highlight: 'The gallery captures GRDC’s community presence and project realities.',
            kpis: [
                { value: '500+', label: 'Curated Images' },
                { value: '16', label: 'Project Albums' },
                { value: 'Quarterly', label: 'Gallery Updates' },
            ],
            sections: [
                {
                    title: 'Gallery Albums',
                    type: 'cards',
                    items: [
                        { title: 'Community Workshops', text: 'Participatory planning and co-creation sessions.' },
                        { title: 'Field Implementation', text: 'On-site program activities and demonstrations.' },
                        { title: 'Policy Dialogue Events', text: 'Regional consultations and stakeholder meetings.' },
                    ],
                },
            ],
        },
        'events-career/upcoming': {
            title: 'Upcoming Events',
            subtitle: 'Scheduled events for knowledge sharing, collaboration, and public engagement.',
            highlight: 'Join upcoming forums, trainings, and launch events organized by GRDC.',
            kpis: [
                { value: '8', label: 'Events Planned' },
                { value: '3', label: 'Regional Hubs' },
                { value: 'Open', label: 'Registration Status' },
            ],
            sections: [
                {
                    title: 'Upcoming Calendar',
                    type: 'timeline',
                    items: [
                        { year: 'May 2026', title: 'Regional Climate Dialogue', detail: 'Evidence exchange between local governments and practitioners.' },
                        { year: 'June 2026', title: 'Research Methods Bootcamp', detail: 'Practical training on field tools and analysis.' },
                        { year: 'July 2026', title: 'GRDC Annual Learning Forum', detail: 'Program reflections and partnership planning.' },
                    ],
                },
            ],
        },
        'events-career/completed': {
            title: 'Completed Events',
            subtitle: 'Recently completed events and learning engagements.',
            highlight: 'Event outputs are integrated into GRDC’s publications and program improvements.',
            kpis: [
                { value: '36', label: 'Events Completed' },
                { value: '2,500+', label: 'Total Participants' },
                { value: '4.7/5', label: 'Average Feedback Score' },
            ],
            sections: [
                {
                    title: 'Recent Completed Events',
                    type: 'cards',
                    items: [
                        { title: 'Policy Impact Clinic', text: 'Strengthened use of evidence in local planning.' },
                        { title: 'Green Livelihood Demo Day', text: 'Showcased pilot innovations and market pathways.' },
                        { title: 'Community Data Fellows Workshop', text: 'Improved local data collection and reporting capacity.' },
                    ],
                },
            ],
        },
        'events-career/vacancy': {
            title: 'Career: Vacancy',
            subtitle: 'GRDC invites motivated professionals to join our mission-focused team.',
            highlight: 'Openings prioritize technical rigor, collaboration, and field-oriented impact.',
            kpis: [
                { value: '5', label: 'Open Positions' },
                { value: 'Hybrid', label: 'Work Mode' },
                { value: 'Rolling', label: 'Application Window' },
            ],
            sections: [
                {
                    title: 'Current Openings',
                    type: 'list',
                    columns: [
                        {
                            title: 'Technical Roles',
                            points: ['Research Associate', 'Climate Adaptation Specialist', 'Monitoring and Learning Officer'],
                        },
                        {
                            title: 'Operations Roles',
                            points: ['Program Coordinator', 'Communications Officer', 'Finance & Compliance Assistant'],
                        },
                    ],
                },
            ],
        },
        'contact-us': {
            title: 'Contact Us',
            subtitle: 'Reach out to collaborate, request publications, or discuss project opportunities.',
            highlight: 'We respond to partnership and information requests through our coordination team.',
            kpis: [
                { value: '<48h', label: 'Typical Response Time' },
                { value: 'Mon-Fri', label: 'Office Availability' },
                { value: 'Global', label: 'Collaboration Scope' },
            ],
            sections: [
                {
                    title: 'Connect with GRDC',
                    type: 'contact',
                    details: [
                        'Green Research & Development Center (GRDC)',
                        'Kathmandu, Nepal',
                        'Email: info@grdc.org',
                        'Phone: +977-1-555-0101',
                    ],
                },
            ],
        },
    };

    createApp({
        data() {
            return {
                menu,
                mobileOpen: false,
                form: {
                    name: '',
                    email: '',
                    subject: '',
                    message: '',
                },
                submitted: false,
            };
        },
        computed: {
            currentPath() {
                return window.location.pathname === '/' ? '/home' : window.location.pathname;
            },
            currentPageKey() {
                const key = this.$el.dataset.pageKey;
                return pages[key] ? key : 'home';
            },
            page() {
                return pages[this.currentPageKey];
            },
            year() {
                return new Date().getFullYear();
            },
        },
        methods: {
            isActive(path) {
                if (path === '/home') {
                    return this.currentPath === '/home';
                }

                return this.currentPath === path;
            },
            submitContact() {
                if (!this.form.name || !this.form.email || !this.form.message) {
                    return;
                }

                this.submitted = true;
                this.form = { name: '', email: '', subject: '', message: '' };
            },
        },
        template: `
            <div class="site-shell">
                <header>
                    <div class="topbar">
                        <div class="container">
                            <span>Non Governmental Organization (NGO): Green Research & Development Center</span>
                            <span>Research | Development | Impact</span>
                        </div>
                    </div>
                    <div class="navbar">
                        <div class="container">
                            <a href="/" class="brand">
                                <span class="brand-badge">G</span>
                                <span class="brand-text">
                                    <strong>GRDC</strong>
                                    Green Research & Development Center
                                </span>
                            </a>
                            <button class="nav-toggle" @click="mobileOpen = !mobileOpen">Menu</button>
                            <nav class="nav-menu" :class="{ show: mobileOpen }">
                                <a href="/" :class="{ active: isActive('/home') }">Home</a>
                                <div class="nav-item" v-for="item in menu" :key="item.label">
                                    <a v-if="!item.children" :href="item.path" :class="{ active: isActive(item.path) }">{{ item.label }}</a>
                                    <a v-else href="#">{{ item.label }}</a>
                                    <div class="dropdown" v-if="item.children">
                                        <a v-for="child in item.children" :href="child.path" :class="{ active: isActive(child.path) }">{{ child.label }}</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </header>

                <main class="container">
                    <section class="hero">
                        <div>
                            <h1>{{ page.title }}</h1>
                            <p>{{ page.subtitle }}</p>
                            <div class="hero-kpis">
                                <article class="kpi" v-for="kpi in page.kpis" :key="kpi.label">
                                    <strong>{{ kpi.value }}</strong>
                                    <span>{{ kpi.label }}</span>
                                </article>
                            </div>
                        </div>
                        <aside class="highlight">
                            <h3>Focus Note</h3>
                            <p>{{ page.highlight }}</p>
                            <p><strong>Navigation:</strong> About Us, Team, Project, Publication, Events/Career, Contact Us</p>
                        </aside>
                    </section>

                    <section class="section" v-for="section in page.sections" :key="section.title">
                        <h2>{{ section.title }}</h2>
                        <p v-if="section.lead" class="lead">{{ section.lead }}</p>

                        <div class="card-grid" v-if="section.type === 'cards'">
                            <article class="card" v-for="item in section.items" :key="item.title">
                                <h3>{{ item.title }}</h3>
                                <p>{{ item.text }}</p>
                            </article>
                        </div>

                        <div class="timeline block" v-if="section.type === 'timeline'">
                            <div class="timeline-item" v-for="item in section.items" :key="item.title">
                                <strong>{{ item.year }} | {{ item.title }}</strong>
                                <p>{{ item.detail }}</p>
                            </div>
                        </div>

                        <div class="list-grid" v-if="section.type === 'list'">
                            <article class="block" v-for="col in section.columns" :key="col.title">
                                <h3>{{ col.title }}</h3>
                                <ul>
                                    <li v-for="point in col.points" :key="point">{{ point }}</li>
                                </ul>
                            </article>
                        </div>

                        <div class="contact-layout" v-if="section.type === 'contact'">
                            <article class="block">
                                <h3>Send a Message</h3>
                                <div class="form-row">
                                    <input v-model="form.name" type="text" placeholder="Full Name">
                                </div>
                                <div class="form-row">
                                    <input v-model="form.email" type="email" placeholder="Email Address">
                                </div>
                                <div class="form-row">
                                    <input v-model="form.subject" type="text" placeholder="Subject">
                                </div>
                                <div class="form-row">
                                    <textarea v-model="form.message" placeholder="Message"></textarea>
                                </div>
                                <button class="primary" @click="submitContact">Submit Inquiry</button>
                                <div class="notice success" v-if="submitted">
                                    Thank you. Your message has been captured in the interface. Backend mail integration can be enabled next.
                                </div>
                            </article>
                            <article class="block">
                                <h3>Contact Details</h3>
                                <ul>
                                    <li v-for="line in section.details" :key="line">{{ line }}</li>
                                </ul>
                            </article>
                        </div>
                    </section>
                </main>

                <footer class="footer">
                    <div class="container">
                        <p>© {{ year }} GRDC. All rights reserved.</p>
                        <div class="footer-links">
                            <a href="/about-us">About</a>
                            <a href="/projects/ongoing">Projects</a>
                            <a href="/publications/reports">Reports</a>
                            <a href="/events-career/upcoming">Events</a>
                            <a href="/contact-us">Contact</a>
                        </div>
                    </div>
                </footer>
            </div>
        `,
    }).mount('#app');
})();
