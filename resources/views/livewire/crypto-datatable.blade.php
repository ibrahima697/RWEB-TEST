<div class="flex mt-3 sm:mt-0 sm:ml-4">
    <div class="w-full max-w-lg mr-3 lg:max-w-xs">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model="search" id="search"
                class="block min-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:border-primary-500 focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                placeholder="search" type="search">
        </div>
    </div>
</div>
        <table class="table table-striped">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left" scope="col">Name</th>
                    <th class="px-6 py-3 text-left" scope="col">Symbol</th>
                    <th class="px-6 py-3 text-left" scope="col">Price</th>
                    <th class="px-6 py-3 text-left" scope="col">Market Cap</th>
                    <th class="px-6 py-3 text-left" scope="col">Volume</th>
                    <th class="px-6 py-3 text-left" scope="col">Circulating Supply</th>
                    <th class="px-6 py-3 text-left" scope="col">Change 24h</th>
                    <th class="px-6 py-3 text-left" scope="col">Image</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
         @foreach($cryptos as $crypto)

                <tr>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap">{{ $crypto['name'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap">{{ $crypto['symbol'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap">{{ $crypto['current_price'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap">{{ $crypto['market_cap'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap">{{ $crypto['total_volume'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap"> {{ $crypto['circulating_supply'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap">{{ $crypto['price_change_24h'] }}</td>
                    <td class="w-3/12 px-6 py-4 whitespace-no-wrap"><img src="{{ $crypto['image'] }}" alt="image"></td>
                </tr>
            
        @endforeach
    </tbody>
</table>

