<x-layouts.backend>
    <div class="row stretch-card">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Users') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ App\Models\User::count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Components') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $components ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Case Studies') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $casestudies ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Reports') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $reports ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Data & Analytics') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $dataanalytics ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Knowledge Products') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $knowledgeproducts ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Publications') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $publications ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-0 text-md font-bold">{{ get_phrase('Notices') }}</h4>
                    </div>
                    <h3 class="text-center text-md">{{ $notices ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</x-layouts.backend>