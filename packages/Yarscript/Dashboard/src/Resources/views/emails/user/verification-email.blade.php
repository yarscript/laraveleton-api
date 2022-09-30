Test
{{--{{ route('registration.verify', ['id' => $data['uuid'], 'hash' => $data['token']]) }}--}}

<a href="{{ route('registration.verify', ['hash' => $data['token']]) }}">Verify</a>
