<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class McodeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            '005' => 'Heater outlet in seat box of rear bench seat.',
            '008' => '???',
            '010' => 'Additional dust sealing for engine compartment. F -- 2x3 2102 496',
            '012' => 'Catlyst operating time recorder. F 2x5 2000 001 --',
            '013' => 'Front bench seat and rear seat in passenger compartment. and interior trim',
            '015' => 'Front bench seat three pers. pass. compart.',
            '019' => 'Without headlamp flasher. F -- 2x9 300 000',
            '020' => 'Speedometer in miles',
            '024' => 'Sealed beam headlamps, side turn signals and back-up lamps F -- 2x9 300 000',
            '024' > 'Sealed beam headlamps, side turn dignals and back-up lamps F 210 2000 001 --',
            '025' => 'Instrument panel; speedometer with trip recorder and clock F 213 2000 001 --',
            '026' => 'With activated carbon container for absorbing fuel vapour F -- 212 2300 000',
            '026' => 'With activated carbon container for absorbing fuel vapour F -- 216 2120 000',
            '026' => 'With activated carbon container for absorbing fuel vapour F 216 2120 000 --',
            '027' => 'Compliance with exhaust emission standards M 157/M 251 California F 214 2032 477',
            '028' => 'Without stretchers, also in combination with M-code 152 (ambulance)',
            '029' => 'Towing hook front and rear F -- 2x1 2300 000',
            '030' => 'Coupled headlamp flasher and license plate light (LHD) F -- 2x2 2088 996',
            '032' => 'Lockable filler cap for fuel tank',
            '034' => 'White front turn signals, side-mounted turn signals F -- 214 2300 000',
            '034' => 'Turn signals, front with plain glass but without emergency light system F 215 2000 001 --',
            '037' => 'Without emergency light system F -- 214 2300 000',
            '042' => '???',
            '046' => 'Side turn signals and inner rearview mirror F 219 060 798 -- 219 300 000',
            '046' => 'Side turn signals F 2x9 300 001 --',
            '047' => 'With back-up lamps F --2x1 2300 000',
            '050' => 'Dual circuit and hand brake control light (only with M 511, not for RHD)',
            '051' => 'Prepared for installation of a 2nd generator',
            '053' => 'Cloth upholstery instead of Leatherette F -- 215 2300 000',
            '054' => 'Lockable glove compartment lid',
            '055' => 'With steering lock F -- 219 300 000',
            '056' => '???',
            '057' => 'Hardwood strips for flatbed not fastened to vehicle',
            '060' => 'Eberspaecher heater (LHD) F 214 2000 001 --',
            '061' => '???',
            '062' => 'Rear view mirror, outer, right (Convex) (LHD) Rear view mirror, inner with shorter arm F -- 219 300 000',
            '062' => 'Sun vizor, right without mirror F 211 2000 001 --',
            '064' => 'Compliance with Sweden exhaust emission standards (LHD) F 214 2000 001 --',
            '064' => 'Without sideflaps',
            '065' => 'Inscriptions for axle load and max weight',
            '066' => 'Floor cover (rubber mat) in passenger compartment',
            '067' => 'Battery 54 A',
            '070' => 'Tilt for pick-up',
            '071' => 'Second lip in side panel',
            '072' => '???',
            '073' => 'Pop-up roof campmobile',
            '074' => 'Mud flaps, rear',
            '082' => 'Mounting parts for first aid kit',
            '083' => 'Warning triangle',
            '085' => '???',
            '086' => 'Drum brakes, self adjusting F 214 2000 001 --',
            '089' => 'Windshield glass (laminated)',
            '090' => '???',
            '092' => 'Gearbox with mountain ratio for mountainous areas',
            '093' => 'Vent wing in rearside window opposite the sliding door F 218 2000 001 --',
            '094' => 'Lockable engine lid',
            '095' => 'Car radio model "Wolfsburg" (MW, LW and tapedeck connection)',
            '096' => 'Car radio model "Braunschweig" (MW, LW, FM with "pushkeys"-automatic and tapedeck connection)',
            '097' => 'Car radio model "Emden" (MW, LW, FM and tapedeck connection)',
            '098' => 'Car radio model "Ingolstadt"',
            '099' => 'Tubeless off-road tires',
            '100' => 'Without VW logo on front',
            '101' => 'Off-the-road radial tyres (tubeless, 185 R 14 M-profile)',
            '102' => 'Rear window heater',
            '103' => 'Heavy duty shock absorbers front and back',
            '106' => 'Upholstery material, special version (cloth) F -- 2x5 2300 000',
            '109' => '???',
            '111' => '???',
            '113' => '???',
            '115' => 'Low-loader pick-up',
            '117' => 'Without seats in rear cabin (crewcab?), at a lower price',
            '119' => '',
            '119' => 'Eberspaecher heater F 2x4 2000 001 --',
            '120' => '???',
            '121' => 'Fresh air fan in cab',
            '123' => 'Special suppression equipment',
            '124' => 'Yellow headlamps and safety rear view mirror F -- 215 2300 000 Yellow headlamps F 214 2000 001 --',
            '127' => 'Rear panel lid without window',
            '128' => '???',
            '130' => 'Without steel sliding roof F -- 213 2300 000',
            '131' => '???',
            '133' => '???',
            '134' => '???',
            '140' => 'Fire truck',
            '141' => 'With heater vent in passenger compart',
            '145' => 'With safety lock, for sliding door and rear panel lid',
            '146' => 'Front beanch seat (two persons) and rear seat in passenger compart. and interior trim',
            '147' => 'Seven-seater model instead of eight-seater model F -- 213 2300 000',
            '147' => 'Seven-seater model instead of eight-seater model F 214 2000 001 --',
            '148' => 'With hinged rear seat backrest F 214 2000 001 -- 216 2300 000',
            '148' => 'With hinged rear seat backrest F 214 2000 001 --',
            '149' => 'Painted instead of chrome parts',
            '150' => 'VW ambulance according to requirement DIN 75080: 2 Fog lights on bumper Protection plates for bottom Maximum tire inflation written above the wheels Symbol-notification of knobs on windshield Reinforcement under upholstery for the mounting of fire extinguishers in the cabin Additional mountings for several pieces of equipment according to the requirement Transparent battery cases (?) obligatory combination with M-code 623',
            '151' => 'Eberspaecher heater F -- 213 2300 000',
            '151' => 'Eberspaecher heater F 214 2000 001 -- (RHD)',
            '152' => 'Simplified rails and stretcher on right-hand side (ambulance)',
            '153' => 'Paper element air cleaner with cyclone without carburet pre-heating (44, 46, 50 BHP) F 215 2000 001 --',
            '155' => 'Two oil bath air cleaner with larger oil capacity F -- 214 2300 000',
            '156' => '',
            '156' => '',
            '157' => 'Exhaust control system Engine nr. B 5000000 - B 5230000 Engine nr. AE 0000001 - AE 0529815',
            '157' => 'Exhaust control system and activated carbon container for absorbing fuel vapour. Engine nr. CB 0062001 - CB 0110000 Engine nr. CD 0000001 - CD 0011000 Engine nr. AW 0000001 - AW 0037000',
            '157' => 'Fuel Injection Engine Engine nr. ED 0000001 -- ED 0025000 Engine nr. GD 0000001 -- GD 0055800 Engine nr. GE 0007083 -- Engine nr. GD 0010984 -- GD 0027786 Engine nr. GE 0000001 -- Engine nr. GD 0019172 -- GD 0025723 Engine nr. GE 0000001 --',
            '160' => 'Rotating light and siren',
            '161' => 'Revolving warning light and high volume horn',
            '161' => 'Seats with mountings for headrest in drivers cab F 213 2000 001 --',
            '162' => 'Rubber molding for bumpers F 213 2000 001 --',
            '171' => 'Tubeless bias-ply tires (?)',
            '172' => 'Tubeless steel-ply tires (?)',
            '177' => 'Rear bench seat in passenger compart.',
            '178' => 'Securing parts for C runner',
            '180' => 'Without front bench seat in passenger compartment',
            '181' => 'Chrome instead of painted parts F 214 2000 001 --',
            '183' => '???',
            '184' => 'Three-point safety belt, front',
            '185' => 'Three-point safety belts (LHD)',
            '186' => 'Safety belts for rear bench seat in passenger compartment',
            '187' => 'Headlamps for RHD',
            '191' => 'With outer and center underfloor plates',
            '193' => 'Compl. with Japan exhaust emiss. standards F 214 2000 001 -- 12/1975',
            '194' => 'Rear view mirror, outer, left and right, Convex',
            '195' => '???',
            '201' => 'Pick-up with enlarged wooden platform',
            '203' => 'Eberspaecher heater F -- 213 2300 000',
            '206' => 'Rear view mirror inner, anti-dazzle',
            '207' => 'Tilt for twin cab pick-up',
            '208' => 'Vehicles with trailer',
            '209' => 'Tilt (PVC)',
            '214' => 'Detachable hinges and dropside attachm.',
            '215' => 'Without louvres for ventilating load area, only with M500/510',
            '217' => 'Attachment for ladder',
            '220' => 'Limited slip differential',
            '221' => 'Vent wing in cab door on drivers side (without M507 and Z05)',
            '222' => 'With fixed windows in passenger compartment instead of vent wings F -- 211 2300 000',
            '225' => 'Additional lining for boot floor, rear corners and hatch (and fleece mat)',
            '226' => 'Retaining cables for tailboard',
            '227' => 'Detachable headrest in cab F 213 2000 001 --',
            '229' => 'Detachable headrest in passenger compartment F 213 2000 001 --',
            '235' => 'Seats with mountings for headrest in passenger compartment F 213 2300 001 --',
            '240' => 'Engine with recessed crown piston for low octane fuel',
            '246' => '???',
            '248' => 'Ignition-starter switch without steer. lock F 210 2000 001 --',
            '248' => 'Fire tender TSF (T), standard equipment to specification DIN 14 530, p.15 and DIN 14 502, p. 2',
            '249' => 'Automatic transmission F 213 2000 001 --',
            '251' => 'With 1.7 liter engine (66 BHP) instead of 1.6 liter engine (50 BHP) F -- 213 2300 000',
            '251' => 'With 1.8 liter engine (68, 70 BHP) instead of 1.6 liter engine (50 BHP) F 214 2000 001 -- 215 2300 000',
            '251' => 'With 2.0 liter engine (70 BHP) instead of 1.6 liter engine (50 BHP) F 216 2000 001 --',
            '252' => 'With 1.3 liter engine (44 BHP) Instead of 1.6 liter engine (50 BHP) F -- 212 2300 000',
            '258' => 'Headrests for drivers seat and front passenger seat',
            '259' => 'Single-person passenger seat in cabin instead of two-person passenger seat (only with M-code 500)',
            '263' => 'Higher load capacity (approx. 1,2 tonns)',
            '276' => '???',
            '288' => 'Headlight washer F 214 2000 001 --',
            '289' => 'Sheer bolt for steering column tube attach.',
            '300' => '???',
            '319' => '???',
            '331' => 'Without partition behind front passenger seat, sliding passenger seat',
            '335' => 'Engine 37 Kw (50 BHP) 1.6 liter F 216 2000 001 --',
            '375' => '???',
            '376' => '???',
            '388' => 'Specifications for Canada M020, M047, M511 (?)',
            '388' => 'Specifications for Canada M020, M047, M511, rear cargo lid with holes for tail lights',
            '389' => 'Specifications for Canada (?)',
            '401' => '???',
            '412' => '???',
            '425' => 'Specifications for the USA M020, M047, M102, sealed beem headlamps... (?)',
            '426' => 'Specifications for the USA M020, M047, M102, sealed beem headlamps... (?)',
            '440' => '???',
            '495' => '???',
            '500' => 'Full-width partition lower with two-seat passenger seat',
            '501' => 'With passenger seat (two persons) F -- 216 2300 000',
            '501' => 'With passenger seat (two persons) F 218 000 001 --',
            '502' => 'Side panel lining, luggage compartment fiberboard',
            '503' => 'Interrior roof trim panels in hardboard',
            '504' => 'With fresh air ducting to load and passenger compartment',
            '505' => '???',
            '506' => 'Brake servo and dual circuit brake warning light',
            '507' => 'Vent wings in cab doors',
            '508' => 'With vent wings in passenger compart. opposite sliding door F -- 211 2300 000',
            '508' => 'With vent wing in sliding door and in all windows in the opposite side of panel F 212 2000 001 -- 217 2300 000',
            '508' => 'Sliding window in the sliding doorand in opposite side panel F 218 2000 001 --',
            '508' => 'Sliding window in the side panel opposite the sliding door F 218 2000 001 --',
            '508' => 'With vent wing in the double cab door and in the opposite side panel F 212 2000 001 --',
            '509' => 'With dust-protected air intake, larger oil bath air cleaner and additional dust sealing F -- 214 2300 000',
            '510' => 'Partition upper between cab and load compartment, with load compartment ventilation (for vehicles with M500 only)',
            '511' => 'Padded instrument panel (LHD only)',
            '512' => 'Without front passenger seat',
            '513' => 'Protection runner for transmission',
            '514' => 'With air circulation heater F -- 211 2300 000',
            '515' => 'High roof deliv. van with extend. slid. roof',
            '516' => 'High roof (plastic) F -- 211 2065 217',
            '516' => 'High roof (plastic) F 211 2065 218 --',
            '517' => 'Campmobile F -- 214 2057 729',
            '518' => 'Campmobile with pop-up roof F -- 214 2057 729',
            '519' => 'Ventilation louvres for cargo compartment',
            '520' => 'With sliding door left and right',
            '521' => 'With additional chrome trim and sun vizor with mirror F -- 219 300 000 Without sun vizor with mirror F 210 2000 001 -- 213 2300 000',
            '522' => 'Specifications for Italy',
            '524' => 'Sealed beam headlamps, dual circuit brake warning light, back-up light and side marker reflectors (LHD) F 219 000 001 -- Without emergency light system F 210 2000 001 --',
            '524' => 'Sealed beam headlamps, dual circuit brake warning light, back-up light and side marker reflectors (LHD) with buzzer for ignition starter switch F 212 2000 001 --',
            '525' => 'Three-point safety belts front, left and right and lap belts in passenger compartment F -- 212 2088 996',
            '527' => 'Exhaust emission control system (only together with M156/M240) M C 0 000 001 -- C 0 100 000',
            '528' => 'Rear view mirror, outer, right (Convex, LHD)',
            '529' => 'full-width partition with sliding window (only with M-code 500)',
            '530' => 'With automatic step',
            '531' => 'With harder rear torsion bars',
            '533' => 'Foot operated alarm system for taxis',
            '535' => 'Tachograph Diehl Co-Pilot (not with M-codes 020, 025 and Z05)',
            '536' => '???',
            '537' => 'Transistor lights in cabin F -- 213 2102 496',
            '540' => 'Net partition between cab and unload compartment',
            '542' => 'Special equipment for German army',
            '543' => 'Without seats in passenger compartment (3-seater)',
            '544' => '???',
            '545' => '???',
            '546' => 'With additional turn signals at the rear on the roof',
            '547' => 'Conservation(?)',
            '549' => 'Three-point safety belt and lap belt, front F 214 2000 001 --',
            '551' => 'Headlamp with halogen lamps instead of bulbs< /td>',
            '557' => 'Clock with preselector heater time switch (LHD) F 215 2000 001 --',
            '558' => 'Additional battery (45 Ah) with division relais(?)',
            '560' => 'Steel sliding roof',
            '568' => 'Tinted side window glass, green tinted F 214 2000 001 --',
            '569' => 'Paper element air cleaner for dusty reg. for twin carburetor engine (70 BHP)',
            '571' => 'Rear fog lamp',
            '572' => '???',
            '575' => '???',
            '583' => '???',
            '586' => '???',
            '587' => 'Car radio model "Hannover"',
            '597' => 'Stronger battery (63 Ah)',
            '601' => 'Special equipment package comprising: M47, M102, emergency light system, dual circuit brake warning light (and padded instrument panel LHD only) F -- 218 220 000',
            '602' => 'Special equipment package comprising: emergency light system, dual circuit brake warning light (and padded intrument panel LHD only) F -- 218 220 000',
            '603' => 'De luxe version F 214 2000 001 --',
            '606' => '2.0 liter engine (68 BHP) Twin carburetor engine with secondary air injection (RHD) M CJ 0 038 155',
            '608' => 'To fulfil exhaust control and safety regulations F 217 2000 001 --',
            '609' => 'VW campmobile de luxe',
            '616' => 'Back-up lamps F 211 2000 001 --',
            '618' => '70 Amp alternator instead 55 Amp F 215 2000 001 -- (with M 251)',
            '623' => 'Prepared for radio communication installation, Fully suppressed electrical installation 1.6 liter (50 BHP) 2.0 liter (70 BHP)',
            '628' => '???',
            '629' => 'Mounting for radiocommunication apparatus FuG 7b Telefunken or SEL in glovebox. Also including speaker in dashboard and wiring',
            '632' => 'Special suppresssion 1.6 liter engine (47, 50 BHP)',
            '640' => '???',
            '652' => 'Interval switch on windshield wipers and wash-wipe installation',
            '659' => 'Halogen fog lamp',
            '663' => "With higher driver's seat backrest (headrest RHD)",
            '671' => '???',
            '673' => 'Tachowelle plombiert für Leasing-Fahrzeuge',
            '690' => 'Passenger seat as swiveling seat',
            '703' => '???',
            '705' => 'Air conditioning (only without sunroof)',
            '707' => '???',
            '708' => '???',
            '709' => 'Steel ply tires(?) with tubes',
            '710' => 'Lens-stop-tail light (yellow/red) instead (yellow, red/white) F 212 2000 001 --',
            '711' => 'Without ventilation louvres for load compartment',
            '712' => 'Factory preparated for money transports (only with M-code 171), conversion made by Fa. Thiele, Bremen',
            '718' => 'Illuminated roof sign (with "Red Cross" or "Malteser Cross" logo)',
            '719' => '???',
            '722' => '???',
            '723' => 'Special sales campaign F 217 2118 500 -- 217 2300 000',
            '728' => 'chrome trim around bus right under windows (only for campmobiles)',
            '729' => 'Textil-belted tyre with tube (?) "Textil-Gürtelreifen mit Schlauch"',
            '731' => '???',
            '737' => '???',
            '741' => 'Window(s) in sliding door(s)',
            '743' => 'Without right hand stretcher, also in combination with M-code 152 (ambulance)',
            '743' => '',
            '744' => 'Wooden floor with rails (?) for device racks (?)',
            '745' => '???',
            '747' => '???',
            '751' => '2 pillows, 1 back rest, 1 belly rest, safety catch on table, without infusion hooks (ambulance)',
            '753' => 'Sliding door on right hand side instead of left hand side',
            '756' => 'Windows in sliding door and panel opposite of sliding door',
            '759' => 'Engine 70 BHP F 216 2119 000 -- 216 2164 000',
            '761' => 'Division between driving cab and load compartment, upper half, hardboard',
            '762' => 'Seats and side trim in black colour',
            '764' => '???',
            '765' => 'Special sales campaign F 218 2070 001 --',
            '766' => 'Special sales campaign',
            '768' => '???',
            '769' => 'Without sliding door(s)',
            '770' => '???',
            '774' => '???',
            '775' => '???',
            '777' => 'Prepared for the installation of UTILA-ambulance (Only for the German state of Bavaria)(only with M-code 500)',
            '779' => 'Ventilation window in drivers door',
            '786' => 'Sliding roof for RHD',
            '790' => '???',
            '791' => 'Prepared for the installation of UTILA-ambulance (Only for the German state of Bavaria)',
            '793' => '???',
            '794' => '???',
            '795' => 'Sliding door on left-side for LHD vehicles',
            '912' => '???',
            '935' => 'Transistorized ignition system',
        ];

        $insert_data = array_map(function ($key, $value) {
            return [
                'code' => $key,
                'description' => $value,
            ];
        }, array_keys($data), $data);

        DB::table('mcodes')->insert($insert_data);

    }
}
