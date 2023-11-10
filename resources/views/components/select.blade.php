@props(['values'])

<select
    {{ $attributes->merge([
        'class' =>
            'form-select rounded-full border-gray-300 h-11 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
    ]) }}>
    @if ($values)
        @foreach ($values as $value)
            <option value="{{ $value->id }}">{{ $value->title }} </option>
        @endforeach
    @else
        Aucune donnée
    @endif
</select>
