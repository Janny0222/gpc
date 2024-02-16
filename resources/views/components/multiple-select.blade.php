@props(['disabled' => false, 'errors', 'name', 'required', 'options'])

{{-- Single Select --}}
{{-- <div 
    wire:ignore
	x-data
	x-init="() => {
	var choices = new Choices($refs.{{ $name }}, {
		itemSelectText: '',
	});
	choices.passedElement.element.addEventListener(
        'change',
        function(event) {
            values = event.detail.value;
            @this.set('{{ $attributes['wire:model'] }}', values);
        },
        false,
	);
	let selected = parseInt(@this.get{!! $attributes['selected'] !!}).toString();
	choices.setChoiceByValue(selected);
	}"
	>
    <select id="{{ $name }}" wire-model="{{ $attributes['wire:model'] }}" wire:change="{{ $attributes['wire:change'] }}" x-ref="{{ $name }}" {{ $required }}>
        <option value="">{{ isset($attributes['placeholder']) ? $attributes['placeholder'] : '-- Select --' }}</option> 
        @if(count($attributes['options'])>0)
            @foreach($attributes['options'] as $key=>$option)
                <option value="{{$key}}" >{{$option}}</option>
            @endforeach
        @endif
    </select>
</div> --}}

{{-- Multiple Select --}}
{{-- <div
    wire:ignore
    x-data
    x-init="() => {
    var choices = new Choices($refs.{{ $name }}, {
        itemSelectText: '',
        removeItems: true,
        removeItemButton: true,
    });
    choices.passedElement.element.addEventListener(
        'change',
        function(event) {
            values = getSelectValues($refs.{{ $name }});
            @this.set('{{ $attributes['wire:model'] }}', values);
        },
        false,
    );
    items = {!! $attributes['selected'] !!};
        if(Array.isArray(items)){
            items.forEach(function(select) {
                choices.setChoiceByValue((select).toString());
            });
        }
    }
    function getSelectValues(select) {
        var result = [];
        var options = select && select.options;
        var opt;
        for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];
            if (opt.selected) {
                result.push(opt.value || opt.text);
            }
        }
        return result;
    }
    ">
    <select id="{{ $name }}" wire-model="{{ $attributes['wire:model'] }}" wire:change="{{ $attributes['wire:change'] }}" x-ref="{{ $name }}" multiple="multiple">
        @if(count($attributes['options'])>0)
            @foreach($attributes['options'] as $key=>$option)
                <option value="{{$key}}" >{{$option}}</option>
            @endforeach
        @endif
    </select>
</div> --}}

<div
    wire:ignore
    x-data="{ values: @entangle($attributes->wire('model')), choices: null }"
    x-init="
        choices = new Choices($refs.multiple, {
            itemSelectText: '',
            removeItems: true,
            removeItemButton: true,
        });

        for (const [value, label] of Object.entries(values)) {
            choices.setChoiceByValue(`${label}`)
            console.log('ok')
        }

        $refs.multiple.addEventListener('change', function (event) {
            values = []
            Array.from($refs.multiple.options).forEach(function (option) {
                values.push(option.value || option.text)
            })
        })
    "
>
    <select x-ref="multiple" multiple="multiple">
        @foreach($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>