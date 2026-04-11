namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecordsExport implements FromQuery, WithHeadings, WithMapping
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query; // Use the filtered query passed from the controller
    }

    public function headings(): array
    {
        return ["Date", "Pen", "Eggs Collected", "Feed", "Notes"];
    }

    public function map($record): array
    {
        return [
            $record->record_date,
            $record->pen->name ?? 'N/A',
            $record->egg_collected,
            $record->feed_consumed,
            $record->note,
        ];
    }
}
