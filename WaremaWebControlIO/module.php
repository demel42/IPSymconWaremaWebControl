<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/CommonStubs/common.php'; // globale Funktionen
require_once __DIR__ . '/../libs/local.php';  // lokale Funktionen

class WaremaWebControlIO extends IPSModule
{
    use StubsCommonLib;
    use WaremaWebControlLocalLib;

    private static $TEL_RAUM_ANLEGEN = 1;
    private static $RES_RAUM_ANLEGEN = 2;
    private static $TEL_RAUM_ABFRAGEN = 3;				// get_Devices()
    private static $RES_RAUM_ABFRAGEN = 4;				// get_Devices()
    private static $TEL_RAUMNAMEN_AENDERN = 5;
    private static $RES_RAUMNAMEN_AENDERN = 6;
    private static $TEL_RAUMREIHENFOLGE_AENDERN = 7;
    private static $RES_RAUMREIHENFOLGE_AENDERN = 8;
    private static $TEL_RAUM_LOESCHEN = 9;
    private static $RES_RAUM_LOESCHEN = 10;
    private static $TEL_KANAL_ANLEGEN = 11;
    private static $RES_KANAL_ANLEGEN = 12;
    private static $TEL_KANAL_ABFRAGEN = 13;			// get_Devices()
    private static $RES_KANAL_ABFRAGEN = 14;			// get_Devices()
    private static $TEL_KANALNAMEN_AENDERN = 15;
    private static $RES_KANALNAMEN_AENDERN = 16;
    private static $TEL_KANALREIHENFOLGE_AENDERN = 17;
    private static $RES_KANALREIHENFOLGE_AENDERN = 18;
    private static $TEL_KANAL_LOESCHEN = 19;
    private static $RES_KANAL_LOESCHEN = 20;
    private static $TEL_RAUM_KOPIEREN = 21;
    private static $RES_RAUM_KOPIEREN = 22;
    private static $TEL_KANAL_IN_RAUM_KOPIEREN = 23;
    private static $RES_KANAL_IN_RAUM_KOPIEREN = 24;
    private static $TEL_AKTOREN_ZUWEISEN = 25;
    private static $RES_AKTOREN_ZUWEISEN = 26;
    private static $TEL_INFRASTRUKTUR_SPEICHERN = 27;
    private static $RES_INFRASTRUKTUR_SPEICHERN = 28;
    private static $TEL_INFRASTRUKTUR_LADEN = 29;
    private static $RES_INFRASTRUKTUR_LADEN = 30;
    private static $TEL_DEF_INFRASTRUKTUR_SPEICHERN = 31;
    private static $RES_DEF_INFRASTRUKTUR_SPEICHERN = 32;
    private static $TEL_KANALBEDIENUNG = 33;			// ??
    private static $RES_KANALBEDIENUNG = 34;
    private static $TEL_POS_RUECKMELDUNG = 35;			// get_Position()
    private static $RES_POS_RUECKMELDUNG = 36;			// get_Position()
    private static $TEL_WINKEN = 37;
    private static $RES_WINKEN = 38;
    private static $TEL_PASSWORT_ABFRAGE = 39;
    private static $RES_PASSWORT_ABFRAGE = 40;
    private static $TEL_PASSWORT_AENDERN = 41;
    private static $RES_PASSWORT_AENDERN = 42;
    private static $TEL_AUTOMATIK = 43;
    private static $RES_AUTOMATIK = 44;
    private static $TEL_GRENZWERTE = 45;
    private static $RES_GRENZWERTE = 46;
    private static $TEL_RTC = 47;
    private static $RES_RTC = 48;
    private static $TEL_POLLING = 49;					// get_Position()
    private static $RES_POLLING = 50;					// get_Position()
    private static $RES_WMS_STACK_BUSY = 51;			// get_Position()
    private static $RES_ERROR_MESSAGE = 52;
    private static $TEL_SPRACHE = 61;					// get_Lang()
    private static $RES_SPRACHE = 62;
    private static $TEL_SET_GRENZWERTE = 63;
    private static $RES_SET_GRENZWERTE = 64;
    private static $TEL_SZENE_ANLEGEN = 69;
    private static $RES_SZENE_ANLEGEN = 70;
    private static $TEL_KANAL_SZENE_ABFRAGEN = 71;
    private static $RES_KANAL_SZENE_ABFRAGEN = 72;
    private static $TEL_LESE_MENUETABELLE_FIX = 73;
    private static $RES_LESE_MENUETABELLE_FIX = 74;
    private static $TEL_LESE_MENUETABELLE_PRODUKT_ABH = 75;
    private static $RES_LESE_MENUETABELLE_PRODUKT_ABH = 76;
    private static $TEL_LESE_WMS_PARAMETER = 77;
    private static $RES_LESE_WMS_PARAMETER = 78;
    private static $TEL_SCHREIBE_WMS_PARAMETER = 79;
    private static $RES_SCHREIBE_WMS_PARAMETER = 80;
    private static $TEL_WMS_INDEX_HEADER_1 = 81;
    private static $RES_WMS_INDEX_HEADER_1 = 82;
    private static $TEL_WMS_INDEX_HEADER_2 = 83;
    private static $RES_WMS_INDEX_HEADER_2 = 84;
    private static $TEL_WMS_INDEX_HEADER_3 = 85;
    private static $RES_WMS_INDEX_HEADER_3 = 86;
    private static $TEL_WMS_INDEX_PARAMETERNAME = 87;
    private static $RES_WMS_INDEX_PARAMETERNAME = 88;
    private static $TEL_WMS_RECHTE = 89;
    private static $RES_WMS_RECHTE = 90;
    private static $TEL_WMS_INDEX_PARAMETERTYP = 91;
    private static $RES_WMS_INDEX_PARAMETERTYP = 92;
    private static $TEL_WMS_PARAMETER_DEFAULTWERT = 93;
    private static $RES_WMS_PARAMETER_DEFAULTWERT = 94;
    private static $TEL_GET_WMS_PARAMETER = 95;
    private static $RES_GET_WMS_PARAMETER = 96;
    private static $TEL_SET_WMS_PARAMETER = 97;
    private static $RES_SET_WMS_PARAMETER = 98;
    private static $TEL_GET_WMS_PARAMETER_ZSP = 99;
    private static $RES_GET_WMS_PARAMETER_ZSP = 100;
    private static $TEL_SET_WMS_PARAMETER_ZSP = 101;
    private static $RES_SET_WMS_PARAMETER_ZSP = 102;
    private static $TEL_KOMFORT = 103;
    private static $RES_KOMFORT = 104;

    private static $ERROR_CODE_SD_KARTE = 13;
    private static $ERROR_CODE_MAX_SZENEN = 8;
    private static $ERROR_CODE_MAX_KANAL = 10;
    private static $ERROR_CODE_POLLING_BEFEHL = 32;
    private static $ERROR_CODE_POLLING_KANAL = 33;
    private static $ERROR_CODE_PROJECT_FILE = 35;
    private static $ERROR_CODE_BEREICHINDEX = 41;
    private static $ERROR_CODE_CONTENT_INVALID = 42;
    private static $ERROR_CODE_PANID_INVALID = 43;

    private static $POLL_KANALBEDIENUNG = 0;
    private static $POLL_POSITION = 1;					// get_Position()
    private static $POLL_GRENZWERTE = 2;
    private static $POLL_AKTOREN_ZUWEISEN = 3;
    private static $POLL_AUTOMATIK = 4;
    private static $POLL_WINKEN = 5;
    private static $POLL_SET_GRENZWERTE = 6;
    private static $POLL_READ_MENUETAB_FIX = 7;
    private static $POLL_READ_MENUETAB_PROD = 8;
    private static $POLL_READ_WMS_PARA = 9;
    private static $POLL_WRITE_WMS_PARA = 10;
    private static $POLL_KOMFORT = 11;

    private static $FC_DONT_CARE = 0;
    private static $FC_STOP = 1;
    private static $FC_SOLL_DIREKT = 2;
    private static $FC_SOLL_SICHER = 3;					// set_Position()
    private static $FC_IMPULS_WENDEN_HOCH = 4;
    private static $FC_IMPULS_WENDEN_TIEF = 5;
    private static $FC_HOCH = 6;
    private static $FC_TIEF = 7;
    private static $FC_SZENE_AUSFUEHREN = 8;
    private static $FC_SZENE_LERNEN = 9;
    private static $FC_TOGGELN = 10;
    private static $FC_AUFDIMMEN = 11;
    private static $FC_ABDIMMEN = 12;
    private static $FC_HOCH_M = 13;
    private static $FC_TIEF_M = 14;
    private static $FC_HOCH_V = 15;
    private static $FC_TIEF_V = 16;
    private static $FC_HOCH_VL = 17;
    private static $FC_TIEF_VL = 18;
    private static $FC_HOCH_VR = 19;
    private static $FC_TIEF_VR = 20;
    private static $FC_EIN = 21;
    private static $FC_AUS = 22;
    private static $FC_TASTE_STOP_DIREKT = 23;
    private static $FC_TASTE_STOP_KURZ = 24;
    private static $FC_TASTE_STOP_LANG = 25;
    private static $FC_TASTE_STOP_DOPPELT = 26;
    private static $FC_TASTE_HOCH_DIREKT = 27;
    private static $FC_TASTE_HOCH_KURZ = 28;
    private static $FC_TASTE_HOCH_LANG = 29;
    private static $FC_TASTE_HOCH_DOPPELT = 30;
    private static $FC_TASTE_TIEF_DIREKT = 31;
    private static $FC_TASTE_TIEF_KURZ = 32;
    private static $FC_TASTE_TIEF_LANG = 33;
    private static $FC_TASTE_TIEF_DOPPELT = 34;
    private static $FC_WINKEN = 41;
    private static $FC_WINKEN_VL = 42;
    private static $FC_WINKEN_VR = 43;

    public function Create()
    {
        parent::Create();

        $this->RegisterPropertyBoolean('module_disable', false);

        $this->RegisterPropertyString('host', '');

        $this->RegisterAttributeInteger('command_counter', 1);

        $this->InstallVarProfiles(false);
    }

    private function CheckConfiguration()
    {
        $s = '';
        $r = [];

        $host = $this->ReadPropertyString('host');
        if ($host == '') {
            $this->SendDebug(__FUNCTION__, '"host" is needed', 0);
            $r[] = $this->Translate('Host must be specified');
        }

        if ($r != []) {
            $s = $this->Translate('The following points of the configuration are incorrect') . ':' . PHP_EOL;
            foreach ($r as $p) {
                $s .= '- ' . $p . PHP_EOL;
            }
        }

        return $s;
    }

    public function ApplyChanges()
    {
        parent::ApplyChanges();

        $vpos = 0;

        $refs = $this->GetReferenceList();
        foreach ($refs as $ref) {
            $this->UnregisterReference($ref);
        }
        $propertyNames = [];
        foreach ($propertyNames as $name) {
            $oid = $this->ReadPropertyInteger($name);
            if ($oid >= 10000) {
                $this->RegisterReference($oid);
            }
        }

        $module_disable = $this->ReadPropertyBoolean('module_disable');
        if ($module_disable) {
            $this->SetStatus(IS_INACTIVE);
            return;
        }

        if ($this->CheckConfiguration() != false) {
            $this->SetStatus(self::$IS_INVALIDCONFIG);
            return;
        }

        $this->SetStatus(IS_ACTIVE);
    }

    protected function GetFormElements()
    {
        $formElements = [];

        $formElements[] = [
            'type'    => 'Label',
            'caption' => 'Warema WebControl IO'
        ];

        @$s = $this->CheckConfiguration();
        if ($s != '') {
            $formElements[] = [
                'type'    => 'Label',
                'caption' => $s
            ];
            $formElements[] = [
                'type'    => 'Label',
            ];
        }

        $formElements[] = [
            'type'    => 'CheckBox',
            'name'    => 'module_disable',
            'caption' => 'Disable instance'
        ];

        $formElements[] = [
            'type'     => 'ValidationTextBox',
            'name'     => 'host',
            'caption'  => 'Hostname of WebControl',
        ];

        return $formElements;
    }

    protected function GetFormActions()
    {
        $formActions = [];

        $formActions[] = [
            'type'    => 'Button',
            'caption' => 'Test access',
            'onClick' => 'WMS_TestAccess($id);'
        ];

        $formActions[] = [
            'type'      => 'ExpansionPanel',
            'caption'   => 'Expert area',
            'expanded ' => false,
            'items'     => [
                [
                    'type'    => 'RowLayout',
                    'items'   => [
                        [
                            'type'    => 'Label',
                            'caption' => 'Decode element "protocol" of url',
                        ],
                        [
                            'type'    => 'ValidationTextBox',
                            'name'    => 'protocol',
                            'caption' => 'String'
                        ],
                        [
                            'type'    => 'Button',
                            'caption' => 'Decode',
                            'onClick' => 'WMS_DecodeProtocol($id, $protocol);'
                        ],
                        [
                            'type'    => 'Label',
                        ],
                    ],
                ],
                [
                    'type'    => 'Button',
                    'caption' => 'Get position',
                    'onClick' => 'WMS_GetPosition($id, 0, 0);'
                ],
                [
                    'type'    => 'RowLayout',
                    'items'   => [
                        [
                            'type'    => 'NumberSpinner',
                            'minimum' => 0,
                            'maximum' => 255,
                            'name'    => 'position',
                            'caption' => 'Position',
                        ],
                        [
                            'type'    => 'Button',
                            'caption' => 'Set position',
                            'onClick' => 'WMS_SetPosition($id, 0, 0, $position);'
                        ],
                    ],
                ],
                [
                    'type'    => 'Button',
                    'caption' => 'Stop',
                    'onClick' => 'WMS_SetStop($id, 0, 0);'
                ],
                [
                    'type'    => 'Button',
                    'caption' => 'Hoch',
                    'onClick' => 'WMS_SetHoch($id, 0, 0);'
                ],
                [
                    'type'    => 'Button',
                    'caption' => 'Tief',
                    'onClick' => 'WMS_SetTief($id, 0, 0);'
                ],
                [
                    'type'    => 'Button',
                    'caption' => 'Re-install variable-profiles',
                    'onClick' => 'WMS_InstallVarProfiles($id, true);'
                ],
            ],
        ];

        $formActions[] = [
            'type'      => 'ExpansionPanel',
            'caption'   => 'Test area',
            'expanded ' => false,
            'items'     => [
                [
                    'type'    => 'TestCenter',
                ],
            ]
        ];

        $formActions[] = $this->GetInformationForm();
        $formActions[] = $this->GetReferencesForm();

        return $formActions;
    }

    public function RequestAction($Ident, $Value)
    {
        if ($this->CommonRequestAction($Ident, $Value)) {
            return;
        }

        if ($this->GetStatus() == IS_INACTIVE) {
            $this->SendDebug(__FUNCTION__, 'instance is inactive, skip', 0);
            return;
        }

        switch ($Ident) {
            default:
                $this->SendDebug(__FUNCTION__, 'invalid ident ' . $Ident, 0);
                break;
        }
    }

    public function GetPosition($room_id, $channel_id)
    {
        $this->get_Position($room_id, $channel_id);
    }

    public function SetPosition($room_id, $channel_id, $position)
    {
        $this->set_Position($room_id, $channel_id, $position, 255, 255, 255);
    }

    public function SetStop($room_id, $channel_id)
    {
        $this->set_Stop($room_id, $channel_id);
    }

    public function SetHoch($room_id, $channel_id)
    {
        $this->set_Hoch($room_id, $channel_id);
    }

    public function SetTief($room_id, $channel_id)
    {
        $this->set_Tief($room_id, $channel_id);
    }

    public function DecodeProtocol($protocol)
    {
        $msg = $this->Translate('Element "protocol"') . ' "' . $protocol . '"' . PHP_EOL;
        $msg .= PHP_EOL;

        $msg .= $this->Translate('Structure') . PHP_EOL;
        $l = strlen($protocol);
        for ($i = 0; $i < $l; $i += 2) {
            $s = substr($protocol, $i, 2);
            $n = $i / 2;
            $msg .= sprintf(' %02d: 0x%s %03d', $n, $s, hexdec($s));
            switch ($n) {
                case 0:
                    $msg .= ' (' . $this->Translate('Command header') . ')';
                    break;
                case 1:
                    $msg .= ' (' . $this->Translate('Command counter') . ')';
                    break;
                case 2:
                    $msg .= ' (' . $this->Translate('Payload length') . ')';
                    break;
                default:
                    $msg .= ' (' . $this->Translate('Payload') . ' ' . strval($n - 2) . ')';
                    break;
            }
            $msg .= PHP_EOL;
        }

        echo $msg;
    }

    private function buildCommand($payload)
    {
        /*
         * bbccllp1p2...
         *   bb=Befehlsheader - fix 0x90
         *   cc==Befehlzähler (1..2⅘4)
         *   ll=payload-length (1..32)
         *   p1=payload1
         *   p2=payload2
         *   ...
         */

        if ($payload == false) {
            $payload = [];
        }
        $l = count($payload);
        if ($l < 1 || $l > 32) {
            $this->SendDebug(__FUNCTION__, 'length of payload must be 1..32, payload=' . print_r($payload, true), 0);
            return false;
        }

        # Befehlsheader
        $cmd = sprintf('%02x', 0x90);

        # Befehlscounter
        $c = $this->ReadAttributeInteger('command_counter');
        $c++;
        if ($c < 1 || $c > 254) {
            $c = 1;
        }
        $this->WriteAttributeInteger('command_counter', $c);
        $cmd .= sprintf('%02x', $c);

        # Payload-length
        $cmd .= sprintf('%02x', $l);

        # Payload
        foreach ($payload as $p) {
            $cmd .= sprintf('%02x', $p);
        }

        $this->SendDebug(__FUNCTION__, 'payload=' . implode(', ', $payload) . ' => cmd=' . $cmd, 0);
        return $cmd;
    }

    private function do_HttpRequest($payload)
    {
        $host = $this->ReadPropertyString('host');

        $cmd = $this->buildCommand($payload);
        if ($cmd == false) {
            return false;
        }

        $ts = (int) (microtime(true) * 1000);
        $url = 'http://' . $host . '/protocol.xml?protocol=' . $cmd . '&_=' . strval($ts);

        $this->SendDebug(__FUNCTION__, 'http-get: url=' . $url, 0);

        $header = [
            'Accept: text/html, */*; q=0.01',
            'User-Agent: Symcon',
            'Accept-Language: de-DE,de;q=0.9',
            'X-Requested-With: XMLHttpRequest',
        ];

        $time_start = microtime(true);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $cdata = curl_exec($ch);
        $cerrno = curl_errno($ch);
        $cerror = $cerrno ? curl_error($ch) : '';
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $duration = round(microtime(true) - $time_start, 2);
        $this->SendDebug(__FUNCTION__, ' => errno=' . $cerrno . ', httpcode=' . $httpcode . ', duration=' . $duration . 's', 0);
        $this->SendDebug(__FUNCTION__, '    cdata=' . $cdata, 0);

        $statuscode = 0;
        $err = '';
        $jdata = false;
        if ($cerrno) {
            $statuscode = self::$IS_SERVERERROR;
            $err = 'got curl-errno ' . $cerrno . ' (' . $cerror . ')';
        } elseif ($httpcode != 200) {
            if ($httpcode >= 500 && $httpcode <= 599) {
                $statuscode = self::$IS_SERVERERROR;
                $err = "got http-code $httpcode (server error)";
            } else {
                $err = 'got http-code ' . $httpcode . '(' . $this->HttpCode2Text($httpcode) . ')';
                $statuscode = self::$IS_HTTPERROR;
            }
        } elseif ($cdata == '') {
            $statuscode = self::$IS_INVALIDDATA;
            $err = 'no data';
        } else {
            $xml = simplexml_load_string($cdata);
            if (gettype($xml) == 'object') {
                $jdata = [];
                foreach ($xml->children() as $key => $val) {
                    $jdata[$key] = (string) $val;
                }
                $responseID = $this->GetArrayElem($jdata, 'responseID', 0);
                if ($responseID == self::$RES_ERROR_MESSAGE) {
                    $statuscode = self::$IS_APPFAIL;
                    $err = $this->decode_error($jdata['errorcode']);
                    $jdata = false;
                }
            } else {
                $statuscode = self::$IS_INVALIDDATA;
                $err = 'malformed data';
            }
        }

        if ($statuscode) {
            $this->LogMessage('url=' . $url . ' => statuscode=' . $statuscode . ', err=' . $err, KL_WARNING);
            $this->SendDebug(__FUNCTION__, ' => statuscode=' . $statuscode . ', err=' . $err, 0);
            $this->SetStatus($statuscode);
        } else {
            $module_disable = $this->ReadPropertyBoolean('module_disable');
            $this->SetStatus($module_disable ? IS_INACTIVE : IS_ACTIVE);
        }

        return $jdata;
    }

    public function TestAccess()
    {
        $s = '- ' . $this->Translate('Warema WebControl configuration') . ' -' . PHP_EOL;
        $s .= PHP_EOL;

        $lang = $this->get_Lang();
        if ($lang != -1) {
            $s .= $this->Translate('Language') . ': ' . $this->DecodeLang($lang) . PHP_EOL;

            $s .= $this->Translate('Devices') . ': ' . PHP_EOL;
            $devices = $this->get_Devices();
            if (count($devices)) {
                foreach ($devices as $device) {
                    $this->SendDebug(__FUNCTION__, 'device=' . print_r($device, true), 0);
                    $s .= ' [' . $device['room_id'] . '/' . $device['channel_id'] . '] ' . $device['room_name'] . '/' . $device['channel_name'];
                    $s .= ': ' . $this->DecodeProduct($device['product']);
                    $s .= PHP_EOL;
                }
            } else {
                $s .= ' ' . $this->Translate('no configured devices') . PHP_EOL;
            }
        } else {
            $s .= $this->Translate('access failed') . PHP_EOL;
        }
        echo $s;
    }

    private function get_Lang()
    {
        $payload = [
            self::$TEL_SPRACHE,
            0xff,
        ];
        $jdata = $this->do_HttpRequest($payload);
        $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
        return isset($jdata['sprache']) ? $jdata['sprache'] : -1;
    }

    private function get_Devices()
    {
        $room_id = 0;
        $channel_id = 0;
        $jdata = false;

        $devices = [];
        while (true) {
            $payload = [
                self::$TEL_RAUM_ABFRAGEN,
                $room_id,
            ];
            $jdata = $this->do_HttpRequest($payload);
            $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
            if ($jdata == false) {
                break;
            }
            $room_name = $this->GetArrayElem($jdata, 'raumname', '');
            if ($room_name == '') {
                break;
            }
            while (true) {
                $payload = [
                    self::$TEL_KANAL_ABFRAGEN,
                    $room_id,
                    $channel_id,
                ];
                $jdata = $this->do_HttpRequest($payload);
                $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
                if ($jdata == false) {
                    break;
                }
                $channel_name = $this->GetArrayElem($jdata, 'kanalname', '');
                if ($channel_name == '') {
                    break;
                }

                $product = $this->GetArrayElem($jdata, 'produkttyp', 255);
                $device = [
                    'room_id'      => $room_id,
                    'room_name'    => $room_name,
                    'channel_id'   => $channel_id,
                    'channel_name' => $channel_name,
                    'product'      => $product,
                ];
                $devices[] = $device;
                $this->SendDebug(__FUNCTION__, 'device=' . print_r($device, true), 0);
                $channel_id++;
            }
            $room_id++;
        }
        return $devices;
    }

    private function get_Position($room_id, $channel_id)
    {
        $payload = [
            self::$TEL_POS_RUECKMELDUNG,
            $room_id,
            $channel_id,
        ];
        $jdata = $this->do_HttpRequest($payload);
        $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
        $responseID = $this->GetArrayElem($jdata, 'responseID', 0);
        if ($responseID != self::$RES_POS_RUECKMELDUNG) {
            $payload = [
                self::$TEL_POLLING,
                $room_id,
                $channel_id,
                self::$POLL_POSITION,
            ];
            $i = 0;
            while (true) {
                IPS_Sleep(1000);
                $jdata = $this->do_HttpRequest($payload);
                $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
                $responseID = $this->GetArrayElem($jdata, 'responseID', 0);
                if ($responseID != self::$RES_POLLING) {
                    break;
                }
                if ($i++ > 5) {
                    break;
                }
            }
        }
        $responseID = $this->GetArrayElem($jdata, 'responseID', 0);
        if ($responseID == self::$RES_POS_RUECKMELDUNG) {
            $res = [];
            if (isset($jdata['fahrt'])) {
                $res['fahrt'] = boolval($jdata['fahrt']);
            }
            if (isset($jdata['position'])) {
                $i = intval($jdata['position']);
                if ($i != 255) {
                    $res['position'] = (int) ($i / 2);
                }
            }
            if (isset($jdata['winkel'])) {
                $i = intval($jdata['winkel']);
                if ($i != 255) {
                    $res['winkel'] = $i - 127;
                }
            }
            if (isset($jdata['positionvolant1'])) {
                $i = intval($jdata['positionvolant1']);
                if ($i != 255) {
                    $res['positionvolant1'] = (int) ($i / 2);
                }
            }
            if (isset($jdata['positionvolant2'])) {
                $i = intval($jdata['positionvolant2']);
                if ($i != 255) {
                    $res['positionvolant2'] = (int) ($i / 2);
                }
            }
            $this->SendDebug(__FUNCTION__, 'res=' . print_r($res, true), 0);
            return $res;
        }
        return false;
    }

    private function set_Position($room_id, $channel_id, $position, $winkel, $volant1, $volant2)
    {
        if ($position != 255) {
            $position *= 2;
        }
        if ($winkel != 255) {
            $winkel += 127;
        }
        if ($volant1 != 255) {
            $volant1 *= 2;
        }
        if ($volant2 != 255) {
            $volant2 *= 2;
        }

        $payload = [
            self::$TEL_KANALBEDIENUNG,
            $room_id,
            $channel_id,
            self::$FC_SOLL_SICHER,
            $position,
            $winkel,
            $volant1,
            $volant2,
        ];

        $jdata = $this->do_HttpRequest($payload);
        $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
    }

    private function set_Stop($room_id, $channel_id)
    {
        $payload = [
            self::$TEL_KANALBEDIENUNG,
            $room_id,
            $channel_id,
            self::$FC_STOP,
        ];

        $jdata = $this->do_HttpRequest($payload);
        $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
    }

    private function set_Hoch($room_id, $channel_id)
    {
        $payload = [
            self::$TEL_KANALBEDIENUNG,
            $room_id,
            $channel_id,
            self::$FC_HOCH,
        ];

        $jdata = $this->do_HttpRequest($payload);
        $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
    }

    private function set_Tief($room_id, $channel_id)
    {
        $payload = [
            self::$TEL_KANALBEDIENUNG,
            $room_id,
            $channel_id,
            self::$FC_TIEF,
        ];

        $jdata = $this->do_HttpRequest($payload);
        $this->SendDebug(__FUNCTION__, 'jdata=' . print_r($jdata, true), 0);
    }

    public function ForwardData($data)
    {
        if ($this->CheckStatus() == self::$STATUS_INVALID) {
            $this->SendDebug(__FUNCTION__, $this->GetStatusText() . ' => skip', 0);
            return;
        }

        $jdata = json_decode($data, true);
        $this->SendDebug(__FUNCTION__, 'data=' . print_r($jdata, true), 0);

        $ret = '';
        if (isset($jdata['Function'])) {
            switch ($jdata['Function']) {
                case 'DeviceList':
                    $devices = $this->get_Devices();
                    $ret = json_encode($devices);
                    break;
                case 'Position':
                    if (isset($jdata['room_id']) == false || isset($jdata['channel_id']) == false) {
                        $this->SendDebug(__FUNCTION__, 'missing room_id/channel_id', 0);
                        break;
                    }
                    $ret = $this->get_Position($jdata['room_id'], $jdata['channel_id']);
                    break;
                default:
                    $this->SendDebug(__FUNCTION__, 'unknown function "' . $jdata['Function'] . '"', 0);
                    break;
                }
        } else {
            $this->SendDebug(__FUNCTION__, 'unknown message-structure', 0);
        }

        $this->SendDebug(__FUNCTION__, 'ret=' . print_r($ret, true), 0);
        return $ret;
    }

    private function decode_error($code)
    {
        $code2text = [
            self::$ERROR_CODE_SD_KARTE        => 'SD_KARTE',
            self::$ERROR_CODE_MAX_SZENEN      => 'MAX_SZENEN',
            self::$ERROR_CODE_MAX_KANAL       => 'MAX_KANAL',
            self::$ERROR_CODE_POLLING_BEFEHL  => 'POLLING_BEFEHL',
            self::$ERROR_CODE_POLLING_KANAL   => 'POLLING_KANAL',
            self::$ERROR_CODE_PROJECT_FILE    => 'PROJECT_FILE',
            self::$ERROR_CODE_BEREICHINDEX    => 'BEREICHINDEX',
            self::$ERROR_CODE_CONTENT_INVALID => 'CONTENT_INVALID',
            self::$ERROR_CODE_PANID_INVALID   => 'PANID_INVALID',
        ];

        if (isset($code2text[$code])) {
            return $code2text[$code];
        } else {
            return 'unknown error-code ' . $code;
        }
    }

    /*
    public function Send(string $Text)
    {
        $this->SendDataToChildren(json_encode(['DataID' => '{B78E405B-23E3-10A5-4B26-F24277883F96}', 'Buffer' => $Text]));
    }
     */
}
