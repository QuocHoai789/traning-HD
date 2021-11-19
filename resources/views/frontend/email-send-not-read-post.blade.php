<h1>Danh sách thống kê những post chưa được đọc trong ngày</h1>
@foreach ($not_read_arr as $id)
    <a href="{{route('post.view', ['id' => $id])}}"><h3>{{getTitle($id)}}</h3></a><br/>
@endforeach