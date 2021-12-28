@extends('includes/cms-header', ['activePage' => 'productCategory'])

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @include('includes.flash-message')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Tambah kategori produk
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        Tambah kategori produk baru
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.productCategory.store')}}" method="post" id="createForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama kategori produk" name="name" autocomplete="off">
                                    {{-- <label>Parent</label> --}}
                                    {{-- {!! Form::open(['route' => 'admin.productCategory.store']) !!} --}}
                                    {{-- {!! Form::label('name', 'Nama') !!}
                                          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'category name']) !!}
                                          {!! Form::label('parent_id', 'Parent Category') !!}
                                          {!! General::selectMultiLevel('parent_id', $categories, ['class' => 'form-control', 'selected' => !empty(old('parent_id')) ? old('parent_id') : '', 'placeholder' => '-- Choose Category --']) !!} --}}
                                    {{-- {!! Form::close() !!} --}}
                                    <label>Choose Parent Category</label>
                                    <select class="form-control" name="parent_id" autocomplete="off">
                                        <option value="0" selected disabled>-- Choose Parent Category --</option>
                                        @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                          @if($category->children)
                                            @foreach($category->children as $children)
                                              <option value="{{$children->id}}">- {{$children->name}}</option>
                                              @if($children->children)
                                                  @foreach($children->children as $children)
                                                  <option value="{{$children->id}}">-- {{$children->name}}</option>
                                                  @endforeach
                                              @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
<!-- /.content -->
@endsection
@section('javascript')
<script>
    $(document).ready(function () {
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            },
        });
        $("#createForm").validate({
            rules: {
                name: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Harap isi nama kategori produk",
                }
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });

</script>
@endsection
