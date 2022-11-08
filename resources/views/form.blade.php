@if(isset($updateData))
    <form action="{{ route('updatedata', ["id" => $updateData->id]) }}" method="post" style="text-align:center;">
        @csrf
        @method('PUT')
        name:<input type="text" name="name" value="{{$updateData->name}}"><br>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        number:<input type="text" name="number" value="{{$updateData->number}}"><br>
        @error('number')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        <input type="submit" value="update">
        <input type="button" value="cancel" id="cancel_button" onclick="history.back()">
    </form>
    @else
    <form action="inputdata" method="post" style="text-align:center;">
        @csrf
        name:<input type="text" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        number:<input type="text" name="number" value="{{ old('number') }}"><br>
        @error('number')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>

        <input type="submit" value="submit">
        <input type="button" value="cancel" id="cancel_button" onclick="history.back()">
    </form>
    @endif