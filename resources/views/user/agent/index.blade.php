w@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="agents-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <x-pagination-info :paginator="$agents" :label="'nhà môi giới'"/>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @foreach ($agents as $agent)
                    <x-agent-listing :agent="$agent" />
                @endforeach
                <x-pagination :paginator="$agents" />
            </div>
        </div>
    </div>
@endsection
