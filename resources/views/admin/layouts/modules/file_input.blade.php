@if(isset($inputName) and isset($label))

        <!-- {{ $label }} Form Input -->
<div class="form-group{{ $errors->has($inputName) ? ' has-error' : '' }}">
    {!! Form::label($inputName, $label,  ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file($inputName) !!}
        {!! $errors->first($inputName, '<span class="help-block">:message</span>') !!}
            @if(isset($hint))
                <p class="help-block hint">{!! $hint !!}</p>
            @endif
        @if (isset($item) and $item->{$inputName})
            <p class="help-block">
                <a  class="fancybox" href="{{ asset(Config::get('project.uploads_folder') . (isset($directory) ? $directory . '/' : '') .  $item->{$inputName}) }}" target="_blank">
                    @if(isset($img))
                        <img src="{{ Image::load((isset($directory) ? $directory . '/' : '') . $img, isset($imgConfig) ? $imgConfig : ['h' => 150]) }}" alt=""/>
                    @else
                        {{ $item->{$inputName} }}
                    @endif
                </a>
            </p>
        @endif
    </div>
</div>

@else
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ isset($label) ? $label : '' }}</label>
        <div class="col-sm-9 alert alert-danger">
            <p>Please assign <code>label</code> and <code>inputName</code> </p><br/>
            <pre><?php echo "@include('admin.layouts.modules.file_input', ['inputName' => 'name', 'label' => 'Label', 'directory' => 'upload_directory'])" ?></pre>
        </div>

    </div>
@endif