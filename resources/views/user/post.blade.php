@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <x-pagination-info :paginator="$properties" :label="'bài đăng'"/>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <form action="" method="get">
                            <div class="d-flex align-items-center justify-content-end">
                                @csrf
                                {{-- <select class="form-select" name="filter" onchange="updateUrl(this.value)"> --}}
                                <select class="form-select" name="filter" onchange="this.form.submit()">
                                    @foreach ($filterOptions as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ $selectedFilter == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @forelse ($properties as $property)
                    <x-property-listing 
                        :property="$property" 
                        :columnSizes="['xl' => 4, 'md' => 6]" 
                        :isFavorite="$property->favoritedBy->contains(Auth::guard('users')->user())" 
                        :isEditable="$property->property_seller_id == Auth::guard('users')->user()->user_id"/>
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
                <x-pagination :paginator="$properties" />
            </div>
        </div>
    </div>
@endsection
