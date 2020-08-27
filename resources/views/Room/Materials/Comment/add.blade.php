 <!-- Comments Form -->
 <div class="card my-4">
     <h5 class="card-header">{{__('Leave a Comment:')}}</h5>
     <div class="card-body">
         <form action="{{route('room.comment',['locale'=>app()->getLocale(),'room'=>$room->id,'user'=>Auth::user()->name])}}" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
             <div class="form-group">
                 <textarea class="form-control" name="comment detail" rows="6"></textarea>
             </div>
             <div class="form-group">
                 <input type="file" id="comment_image" name="comment_image" />
                 <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
             </div>

             <div id="image_preview"></div>
             @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>

             @endif
         </form>
     </div>
 </div>