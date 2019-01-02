# Laravel Redis Queue

An example implementation of a Laravel Redis Queue.

## How To Use

1. Run a Redis server locally on port `6379`
2. Within `/app` run `php artisan queue:work` to begin listening
3. Dispatch the example `CountSheep` job via `php artisan CountSheep::dispatch($args...)`
4. Your queue worker will respond with the output of your particular sleep

## Roadmap

I will be adding the following example features when possible.

### High Priority

- [ ] Multiple Jobs
- [ ] Chaining Jobs
- [ ] Delaying Jobs
- [ ] Job Timeouts/Attempts
- [ ] Error Handling

### Med Priority

- [ ] Have Queue Save to local DB
- [ ] Prioritising Queues
- [ ] Multiple Queues
- [ ] Before/After methods

### Low Priority

- [ ] Web Interface for adding Jobs
- [ ] Supervisor (Linux only?)
