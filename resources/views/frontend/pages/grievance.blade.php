<x-layouts.frontend>
    <main>
        <!-- Submit a Complaint Form -->
        <section class="section" id="submit-grievance">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Submit a Complaint</h2>
                    <p class="section-subtitle">
                        Please fill out the form below to register your concern. We will respond as soon as possible.
                    </p>
                </div>

                <div class="contact-form">
                    <form id="grievanceForm" action="{{ route('grievances.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" class="form-input" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-input" name="contact_number">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" name="email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nature of Grievance *</label>
                            <select class="form-input" name="category" required>
                                <option value="">Select Category</option>
                                <option value="project-issue">Project Implementation Issue</option>
                                <option value="environmental">Environmental Concern</option>
                                <option value="social">Social/Community Issue</option>
                                <option value="financial">Financial Mismanagement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description *</label>
                            <textarea class="form-textarea" name="description" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Submit Complaint
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend>