<label for="{{ $fieldId }}" class="form-label">{{ $label }}</label>

<input  type="{{ $type }}"
        class="form-control @error($fieldId) is-invalid @enderror"
        id="{{ $fieldId }}"
        name="{{  $fieldId }}"

        @if($fieldId !== 'password')
        value="{{ old($fieldId, $model->{$fieldId}) }}"
        @endif
        />

<div id="{{ $fieldId }}Help" class="form-text">{{ $helpText }}</div>

@error($fieldId)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
