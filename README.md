## Laravel CMS Task

### Admin Side

1. Category Module\
	1.1 URL - http://localhost:8000/admin/category \
	1.2 complete CRUD\
	1.3 Delete Category with Subcategory and Product using HasMany Relationship\

2. Sub Category Module\
	2.1 URL - http://localhost:8000/admin/sub-category \
	2.2 Complete CRUD\
	2.3 Save this data with Category ID\
	2.4 Display sub_category data and also category data in it using BelongsTo Relationship\
	2.5 Delete Data with Products using HasMany Relationship

3. Products Module\
	3.1 URL - http://localhost:8000/admin/products \
	3.2 Complete CRUD\
	3.3 Save this data with Category ID\
	3.4 Display product data and also sub_category data in it using BelongsTo Relationship\
	3.5 Delete Data with Products using HasMany Relationship\


### Frontend side:

1. In home Page\
	1.1 URL - http://localhost:8000/ \
	1.2 All Categories Displayed\
	1.3 Click to View for SubCategories

2. Click on Category\
	2.1 URL - http://localhost:8000/{category} \
	2.2 Display all Sub_categories added under Category

3. Click on Sub_Category\
	3.1 URL - http://localhost:8000/{category}/{sub_Category} \
	3.2 Display all products added under Sub_Category.

4. Click on Product\
	4.1 URL - http://localhost:8000/{category}/{sub_Category}/{product} \
	4.2 View One Product Detail

