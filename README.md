# Övningar för Lektion 5: Laravel
Repetition är kunskapens moder!
Ni skall nu göra om övning 3 från lektion 2 i Laravel och sedan även göra om övningarna från lektion 3 (API:er) i Laravel.
## Övning 1
Hämta data via cURL från https://www.milletech.se/invoicing/export/customers.
Ta den tabellstruktur som ni gjort tidigare och skriv in den som migrationer i Laravel.
Det skall finnas en migration för varje tabell.
Efter att du har gjort färdigt dina migrationer och testat dem så skriver du ett artisankommando för att importera kunderna.

1. Gör migrationer via php artisan make:migration - en för varje tabell
2. Gör ett konsollkommando via  php artisan make:command ImportCustomers
3. Ge kommandot signaturen import:customers
4. Allting görs i handle-metoden!
5. Ta curl-koden från den gemensamma övningen. Du behöver inte spara datan i en fil nu.
6. Gör en Customer-modell via php artisan make:model Customer
7. Justera modellens inställningar så att id inte är autoinkrementerande och timestamps är avstängt.
8. Skriv en whitelist via $fillable som innehåller alla fält i tabellen.
9. Gör hela modell-biten för din adresstabell också.
10. Loopa igenom datan och sätt in datan i databasen via dina modeller.
11. Kolla om modellen redan finns via Customer::find($id). Om modellen inte finns så blir det null.
12. Om modellen inte redan finns gör en ny via $customer = new Customer();
13. Spara med $customer->save()
14. Gör samma sak med adresserna!

## Övning 2
Nu är det dags att börja exponera den data som du hämtat hem i Laravel.
Enligt god REST-sed så skall det finnas en route som heter /customers som motsvarar Customer som resurs och modell.
Gör en controller som heter CustomersController och en modell för customers-tabellen som heter Customer.
/customers skall skriva ut all data från tabellen i json-format på skärmen.
Skicka lämplig header för att visa att det är json-data du skickar och inte vanlig html.
## Övning 3
Bygg vidare så att man kan hämta ut en kund i taget.
Url-strukturen för detta är /customers/{id}.
Exempel på url: http://wieg16-api.dev/customers/1
Denna url skall då visa mig kunden med id 1 i json-format.
## Övning 4
Det kan vara så att man skriver ett customer_id som inte finns.
Skriv kod som hanterar att du inte får någon träff i databasen.
En http statuskod på 404 måste skickas och ett lämpligt meddelande i json skall skrivas ut.
Exempel {"message": "Customer not found"}
## Övning 5
Skriv kod för att enbart visa kundens adress.
Detta är en nästlad resurs och url:en skall spegla detta.
Exempel på url: http://wieg16-api.dev/customers/1/address
Då skall adressen för kunden med id 1 skrivas ut på skärmen i json-format.
## Övning 6
Datan som du hämtat hem tidigare är lite dåligt strukturerad. Det har visat sig att vi har behov av att veta vilka kunder som tillhör samma företag.
Skapa en separat tabell för företagen (förslagsvis companies) genom att skriva en ny migrering och koppla ihop den tabellen med din customers-tabell.
Skriv sedan kod som går igenom datan och plockar ut företagsnamnen.
Företagsnamnen lagras sedan i den nya separata tabellen och kunder med detta företagsnamn skall få samma company_id.
## Övning 7
Utöka din customers.php så att man kan hämta kunder baserat på company_id.
Om company_id anges så skall alla kunder med detta id visas.
Exempel på url: http://wieg16-api.dev/customers?company_id=1
Denna url skall då visa mig alla kunder med company_id 1 i json-format.