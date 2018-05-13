@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/programs.edit') }} {{ $item->title }}@endsection

@section('pageTitle'){{ trans('backend/programs.edit') }} {{ $item->title }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('programs.index') }}">{{ trans('backend/programs.control') }}</a></li>
    <li class="active">{{ trans('backend/programs.edit') }} {{ $item->title }}</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <form action="{{ route('program.update', $item->id) }}" method="post" role="form">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="category">{{ trans('backend/programs.attributes.category') }}</label>
                                        <select name="category_id" class="form-control" id="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"{{ $category->id == old('category_id', $item->category_id) ? ' selected' : '' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ trans('backend/programs.attributes.title') }}</label>
                                        <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" id="title" placeholder="{{ trans('backend/programs.hints.title') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ trans('backend/programs.attributes.description') }}</label>
                                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="{{ trans('backend/programs.hints.description') }}">{!! old('description', $item->description) !!}</textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">{{ trans('backend/master.control.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection