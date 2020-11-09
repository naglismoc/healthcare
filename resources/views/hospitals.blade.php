

<x-jet-label for="hospital" value="{{ __('Hospital') }}" />
<select name="hospital" id="hospital" size="<?=count($hospitals)?>" multiple>
   
  
    @foreach ($hospitals as $hospital)
    <option value="{{$hospital->name}}">{{$hospital->name}}</option>
    @endforeach

</select>