@extends('Administrator.Layouts.index')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Chức Năng</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($aboutElementor as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{!! $value->title !!}</td>
                        <td>{!! $value->content!!} </td>
                        <td>
                            <button onclick="sua({{$value->id}});return false;" class="btn btn-gradient-primary btn-sm" title="Sửa">
                            Edit<i class="mdi mdi-file-check btn-icon-append"></i>
                            </button>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<script>
  function sua(id){
    document.location.href="/suaelementor/"+id+"";
  }
</script> 
@endsection