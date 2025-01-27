<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />
</head>

<body>
    <x-header />


    <div class="search-results">
        <h2>Search Results for "{{ $searchTerm }}"</h2>

        @forelse ($tree as $companyData)
            <div class="company">
                <h3>Company: {{ $companyData['company']->name }}</h3>
                <p>Location: {{ $companyData['company']->city }}, {{ $companyData['company']->state }}</p>

                @forelse ($companyData['categories'] as $categoryData)
                    <div class="category">
                        <h4>Category: {{ $categoryData['category']->name }}</h4>

                        @forelse ($categoryData['subcategories'] as $subCategoryData)
                            <div class="subcategory">
                                <h5>Subcategory: {{ $subCategoryData['subcategory']->name }}</h5>

                                <ul class="products">
                                    @forelse ($subCategoryData['products'] as $product)
                                        <li>{{ $product->name }} - {{ $product->description }}</li>
                                    @empty
                                        <li>No products found in this subcategory.</li>
                                    @endforelse
                                </ul>
                            </div>
                        @empty
                            <p>No subcategories found in this category.</p>
                        @endforelse
                    </div>
                @empty
                    <p>No categories found for this company.</p>
                @endforelse
            </div>
        @empty
            <p>No companies found.</p>
        @endforelse
    </div>






</body>

</html>
