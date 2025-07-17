@php
    if (!function_exists('getFormedData')) {
        function getFormedData($pData, string $row): array {
            $lastEl = null;
            $j = 0;
            $realPD = [];
            foreach ($pData as $profileRow) {
                if(!$lastEl) { // First element to save
                    $lastEl = $profileRow;
                    $realPD[$j][$row] = $profileRow->{$row};
                    $realPD[$j]['colspan'] = 1;
                } else {
                    if ($lastEl->{$row} == $profileRow->{$row}) {
                       if (isset($realPD[$j]['colspan'])) {
                            $realPD[$j]['colspan']++;
                        } else {
                            $realPD[$j]['colspan'] = 1;
                        }
                    } else {
                        $lastEl = $profileRow;
                        $j++;
                        $realPD[$j][$row] = $profileRow->{$row};
                        $realPD[$j]['colspan'] = 1;
                    }
                }
            }
            return $realPD;
        }
    }
@endphp

<td class="description-col">{{ __('dynamic.table-texts.' . $rowName) }}</td>
@foreach(getFormedData($profileData, $row) as $rowEl)
    <td class="data" colspan="{{ $rowEl['colspan'] }}">{{ $rowEl[$row] }}</td>
@endforeach
@if ($tab == 1 && isset($compareProfileData) && !empty($compareProfileData))
    @foreach(getFormedData($compareProfileData, $row) as $rowElC)
        <td class="data" colspan="{{ $rowElC['colspan'] }}">{{ $rowElC[$row] }}</td>
    @endforeach
@endif
@foreach(getFormedData($europeData, $row) as $rowElUE)
    <td class="data" colspan="{{ $rowElUE['colspan'] }}">{{ $rowElUE[$row] }}</td>
@endforeach
