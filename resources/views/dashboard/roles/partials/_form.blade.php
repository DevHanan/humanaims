
@inject('permissions','App\Models\Permission')

<div class="form-group  col-md-12">
    <label for="formInputArabicName"> {{__('back.Arabic Name')}}</label>
    {!! Form::text('name_ar',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'title_ar')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputEnglishName"> {{__('back.English Name')}}</label>
    {!! Form::text('name_en',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'title_en')}}
</div>



<div class="form-group  col-md-12">
    <label for="formInputPermissions"> {{__('back.Permissions')}} </label>
    {{ Form::select('permissions[]', $permissions->all()->pluck('name', 'id')->toArray(), null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off"  , 'multiple'=> 'multiple']) }}
    {{input_error($errors,'permissions')}}
</div>

<!--   <div class="form-group  col-md-12 {{ $errors->has('permissions') ? 'has-error' : '' }}">
                <label for="permissions">{{__('Permissions')}}*
                    <span class="btn btn-info btn-xs select-all">{{__('Select all')}}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{__('Deselect all')}}</span></label>
                <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple" required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{__('Please Select at least one permission')}}
                </p>

            </div> -->







