<?php

namespace App\Http\Controllers;

use App\Models\Backend\CaseStudy;
use App\Models\Backend\CaseStudyCategory;
use App\Models\Backend\MediaCoverage;
use App\Models\Backend\Notice;
use App\Models\Backend\Page;
use App\Models\Backend\ProjectComponent;
use App\Models\Backend\ProjectDescription;
use App\Models\Backend\ProjectObjective;
use App\Models\Backend\ProjectResource;
use App\Models\Backend\Publication;
use App\Models\Backend\PublicationCategory;
use App\Models\Backend\Section;
use App\Models\Backend\Slider;
use App\Models\Event;
use App\Models\Media;
use App\Models\Nepali\CaseStudy as NepaliCaseStudy;
use App\Models\Nepali\CaseStudyCategory as NepaliCaseStudyCategory;
use App\Models\Nepali\Event as NepaliEvent;
use App\Models\Nepali\MediaCoverage as NepaliMediaCoverage;
use App\Models\Nepali\Page as NepaliPage;
use App\Models\Nepali\ProjectComponent as NepaliProjectComponent;
use App\Models\Nepali\ProjectDescription as NepaliProjectDescription;
use App\Models\Nepali\ProjectResource as NepaliProjectResource;
use App\Models\Nepali\Publication as NepaliPublication;
use App\Models\Nepali\PublicationCategory as NepaliPublicationCategory;
use App\Models\Nepali\Section as NepaliSection;
use App\Models\Tamang\CaseStudy as TamangCaseStudy;
use App\Models\Tamang\CaseStudyCategory as TamangCaseStudyCategory;
use App\Models\Tamang\Event as TamangEvent;
use App\Models\Tamang\MediaCoverage as TamangMediaCoverage;
use App\Models\Tamang\Page as TamangPage;
use App\Models\Tamang\ProjectComponent as TamangProjectComponent;
use App\Models\Tamang\ProjectDescription as TamangProjectDescription;
use App\Models\Tamang\ProjectResource as TamangProjectResource;
use App\Models\Tamang\Publication as TamangPublication;
use App\Models\Tamang\PublicationCategory as TamangPublicationCategory;
use App\Models\Tamang\Section as TamangSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->where('status', 1)->take(6)->get();
        $language = request()->input('language');

        if (!$language) {
            $language = session('language');
        }

        session(['language' => $language]);

        $sections = $language == 'nepali' ? NepaliSection::where('showOnFront', 1)->get() : ($language == 'tamang' ? TamangSection::where('showOnFront', 1)->get() : Section::where('showOnFront', 1)->get());
        $components = $language == 'nepali' ? NepaliProjectComponent::take(3)->get() : ($language == 'tamang' ? TamangProjectComponent::take(3)->get() : ProjectComponent::take(3)->get());
        $project_areas = Media::where('type', 'Project Area')->take(3)->get();
        $gallery_images = Media::where('type', 'Gallery')->take(11)->get();
        return view('frontend.pages.index', compact('sliders', 'sections', 'components', 'project_areas', 'gallery_images'));
    }

    public function page_single($slug)
    {
        $page = session('language') == 'nepali' ? NepaliPage::where('slug', $slug)->firstOrFail() : (session('language') == 'tamang' ? TamangPage::where('slug', $slug)->firstOrFail()  : Page::where('slug', $slug)->firstOrFail());
        if ($slug == 'reports' || $slug == 'data-analytics' || $slug == 'knowledge-products') {
            $type = $slug == 'reports' ? 'Report' : ($slug == 'data-analytics' ? 'Data & Analytics' : 'Knowledge Products');
            $resources = session('language') == 'nepali' ? NepaliProjectResource::where('type', $type)->get() : (session('language') == 'tamang' ? TamangProjectResource::where('type', $type)->get() : ProjectResource::where('type', $type)->get());
            return view('frontend.pages.resources', compact('page', 'resources'));
        }

        if ($slug == 'publications') {
            $categories = session('language') == 'nepali' ? NepaliPublicationCategory::where('status', 1)->get() : (session('language') == 'tamang' ? TamangPublicationCategory::where('status', 1)->get() : PublicationCategory::where('status', 1)->get());
            $publications = session('language') == 'nepali' ? NepaliPublication::with('category:id,slug')->where('status', 1)->get() : (session('language') == 'tamang' ? TamangPublication::with('category:id,slug')->where('status', 1)->get() : Publication::with('category:id,slug')->where('status', 1)->get());
            return view('frontend.pages.publications', compact('page', 'categories', 'publications'));
        }

        if ($slug == 'events-notices' || $slug == 'events' || $slug == 'notices') {
            $events = session('language') == 'nepali' ? NepaliEvent::orderBy('date', 'desc')->where('status', 1)->latest()->take(6)->get() : (session('language') == 'tamang' ? TamangEvent::orderBy('date', 'desc')->where('status', 1)->latest()->take(6)->get() : Event::orderBy('date', 'desc')->where('status', 1)->latest()->take(6)->get());
            $notices = session('language') == 'nepali' ? Notice::latest()->take(4)->get() : (session('language') == 'tamang' ? Notice::latest()->take(4)->get() : Notice::latest()->take(4)->get());
            $mediaCoverages = session('language') == 'nepali' ? NepaliMediaCoverage::orderBy('published_at', 'desc')->take(6)->get() : (session('language') == 'tamang' ? TamangMediaCoverage::orderBy('published_at', 'desc')->take(6)->get() : MediaCoverage::orderBy('published_at', 'desc')->take(6)->get());
            return view('frontend.pages.events-notices', compact('page', 'events', 'notices', 'mediaCoverages'));
        }

        if ($slug == 'gallery') {
            $gallery_images = Media::where('type', 'Gallery')->where('status', 1)->latest()->paginate(12);
            return view('frontend.pages.gallery', compact('page', 'gallery_images'));
        }

        if (View::exists('frontend.pages.' . $slug)) {
            return view('frontend.pages.' . $slug, compact('page'));
        }
        return view('frontend.pages.single', compact('page'));
    }

    public function media_coverage_single($slug)
    {
        $query = session('language') == 'nepali' ? NepaliMediaCoverage::query() : (session('language') == 'tamang' ? TamangMediaCoverage::query() : MediaCoverage::query());
        $mediaCoverage = $query->where('slug', $slug)->firstOrFail();
        return view('frontend.pages.media-coverage-single', compact('mediaCoverage'));
    }

    public function project_description()
    {
        $page = session('language') == 'nepali' ? NepaliPage::where('slug', 'project-description')->firstOrFail() : (session('language') == 'tamang' ? TamangPage::where('slug', 'project-description')->firstOrFail() : Page::where('slug', 'project-description')->firstOrFail());
        $query = session('language') == 'nepali' ? NepaliProjectDescription::orderBy('ord', 'asc') : (session('language') == 'tamang' ? TamangProjectDescription::orderBy('ord', 'asc') : ProjectDescription::orderBy('ord', 'asc'));
        $rows = $query->where('type', 'descriptions')
            ->where('status', 1)
            ->get();
        return view('frontend.pages.project-description', compact('page', 'rows'));
    }

    public function project_objective()
    {
        $page = session('language') == 'nepali' ? NepaliPage::where('slug', 'objectives')->firstOrFail() : (session('language') == 'tamang' ? TamangPage::where('slug', 'objectives')->firstOrFail() : Page::where('slug', 'objectives')->firstOrFail());
        $query = session('language') == 'nepali' ? NepaliProjectDescription::orderBy('ord', 'asc') : (session('language') == 'tamang' ? TamangProjectDescription::orderBy('ord', 'asc') : ProjectDescription::orderBy('ord', 'asc'));
        $rows = $query->where('type', 'objectives')
            ->where('status', 1)
            ->get();
        return view('frontend.pages.objectives', compact('page', 'rows'));
    }

    public function case_studies()
    {
        $page = session('language') == 'nepali' ? NepaliPage::where('slug', 'case-studies')->firstOrFail() : (session('language') == 'tamang' ? TamangPage::where('slug', 'case-studies')->firstOrFail() : Page::where('slug', 'case-studies')->firstOrFail());
        $rows = session('language') == 'nepali' ? NepaliCaseStudyCategory::where('status', 1)->get() : (session('language') == 'tamang' ? TamangCaseStudyCategory::where('status', 1)->get() : CaseStudyCategory::where('status', 1)->get());
        return view('frontend.pages.case-studies', compact('page', 'rows'));
    }

    public function case_studies_single($slug)
    {
        $caseStudy = session('language') == 'nepali' ? NepaliCaseStudy::where('slug', $slug)->firstOrFail() : (session('language') == 'tamang' ? TamangCaseStudy::where('slug', $slug)->firstOrFail() : CaseStudy::where('slug', $slug)->firstOrFail());
        return view('frontend.pages.case-studies-single', compact('caseStudy'));
    }

    public function notice_single($slug)
    {
        $notice = session('language') == 'nepali' ? Notice::where('slug', $slug)->firstOrFail() : (session('language') == 'tamang' ? Notice::where('slug', $slug)->firstOrFail() : Notice::where('slug', $slug)->firstOrFail());
        return view('frontend.pages.notice-single', compact('notice'));
    }

    public function fetch_case_studies($slug)
    {
        $caseStudyCategory = session('language') == 'nepali' ? NepaliCaseStudyCategory::where('slug', $slug)->firstOrFail() : (session('language') == 'tamang' ? TamangCaseStudyCategory::where('slug', $slug)->firstOrFail() : CaseStudyCategory::where('slug', $slug)->firstOrFail());
        $rows = $caseStudyCategory->case_studies()->where('status', 1)->get();
        return view('frontend.pages.includes.case-studies-modal', compact('caseStudyCategory', 'rows'))->render();
    }

    public function components()
    {
        $page = session('language') == 'nepali' ? NepaliPage::where('slug', 'components')->firstOrFail() : (session('language') == 'tamang' ? TamangPage::where('slug', 'components')->firstOrFail() : Page::where('slug', 'components')->firstOrFail());
        $rows = session('language') == 'nepali' ? NepaliProjectComponent::where('status', 1)->get() : (session('language') == 'tamang' ? TamangProjectComponent::where('status', 1)->get() : ProjectComponent::where('status', 1)->get());
        return view('frontend.pages.components', compact('page', 'rows'));
    }

    public function component_single($slug)
    {
        $page = null;
        $query = session('language') == 'nepali' ? NepaliProjectComponent::orderBy('id', 'desc') : (session('language') == 'tamang' ? TamangProjectComponent::orderBy('id', 'desc') : ProjectComponent::orderBy('id', 'desc'));
        if ($slug == 'component-1') {
            $page = $query->first();
        } else if ($slug == 'component-2') {
            $page = $query->skip(1)->first();
        } else if ($slug == 'component-3') {
            $page = $query->skip(2)->first();
        }
        return view('frontend.pages.components.' . $slug, compact('page'));
    }

    public function search()
    {
        $term = request('s', 'about');
        $query = session('language') == 'nepali' ? NepaliPage::query() : (session('language') == 'tamang' ? TamangPage::query() : Page::query());
        $results = $query->where('title', 'like', '%' . strtolower($term) . '%')->orWhere('content', 'like', '%' . strtolower($term) . '%')->get();
        $title = 'Search Result for "' . $term . '"';
        return view('frontend.pages.searchResults', compact('title', 'term', 'results'));
    }
}
